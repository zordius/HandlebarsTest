#!/usr/bin/env php
<?php

require(dirname(__DIR__).'/src/Template.php');
require(dirname(__DIR__).'/src/Renderer.php');
require(dirname(__DIR__).'/src/RendererPHP.php');


class TestMustacheRenderer extends \Mustache\Renderer
{
	protected function fetchPartialContent($partial)
	{
		return "«partial {$partial}»";
	}
}


class DataTester
{
	protected $test_id;
	protected $tests = 0;
	protected $passed = 0;
	protected $failed = 0;
	protected $failures = array();
	protected $show_failures = false;
	protected $colour = null;

	const NO_TEST = 'no_test';
	const NO_DATA = 'no_data';

	public function __construct($test_id = null, $show_failures = false)
	{
		$this->test_id = $test_id;
		$this->show_failures = $show_failures;
	}

	protected function colour()
	{
		if (!$this->colour) return '';

		$ret = '';
		foreach (func_get_args() as $c) {
			switch ($c) {
				case 'bold':       $ret .= "\033[1m";  break;
				case 'red':        $ret .= "\033[31m"; break;
				case 'green':      $ret .= "\033[32m"; break;
				case 'yellow':     $ret .= "\033[33m"; break;
				case 'blue':       $ret .= "\033[34m"; break;
				case 'magenta':    $ret .= "\033[35m"; break;
				case 'cyan':       $ret .= "\033[36m"; break;
				case 'white':      $ret .= "\033[37m"; break;
				case 'red-bg':     $ret .= "\033[41m"; break;
				case 'green-bg':   $ret .= "\033[42m"; break;
				case 'yellow-bg':  $ret .= "\033[43m"; break;
				case 'blue-bg':    $ret .= "\033[44m"; break;
				case 'magenta-bg': $ret .= "\033[45m"; break;
				case 'cyan-bg':    $ret .= "\033[46m"; break;
				case 'white-bg':   $ret .= "\033[47m"; break;
				case 'reverse':    $ret .= "\033[7m";  break;
				case 'reset':      $ret .= "\033[0m";  break;
				default:
					throw new InvalidArgumentException('Unrecognised colour: '.$c);
			}
		}
		return $ret;
	}

	protected function pass()
	{
		++$this->tests;
		++$this->passed;
		echo $this->colour('bold', 'green') . "." . $this->colour('reset') . $this->postTestWhitespace();
	}

	protected function fail($test_id, $expected, $actual)
	{
		++$this->tests;
		++$this->failed;
		$this->failures[] = array(
			'test_id' => $test_id,
			'expected' => $expected,
			'actual' => $actual,
		);
		echo $this->colour('bold', 'white', 'red-bg') . "F" . $this->colour('reset') . $this->postTestWhitespace();
	}

	protected function postTestWhitespace()
	{
		if (($this->tests % 40) == 0) {
			return "\n";
		} elseif (($this->tests % 10) == 0) {
			return " ";
		}
		return '';
	}

	protected function getData($test_id)
	{
		$test_path = sprintf(__DIR__.'/data/test-%04d.json', $test_id);
		if (!file_exists($test_path)) {
			return static::NO_TEST;
		}
		$ret = json_decode(file_get_contents($test_path), true);
		if (!is_array($ret)) {
			return static::NO_TEST;
		}
		return $ret;
	}

	protected function runTest($test_id)
	{
		$testdata = $this->getData($test_id);
		if (!is_array($testdata)) {
			return $testdata;
		}
		if (is_array($testdata['tpl'])) {
			$tpls = $testdata['tpl'];
		} else {
			$tpls = array($testdata['tpl']);
		}
		if (isset($testdata['dataset'])) {
			$datas = $testdata['dataset'];
		} else {
			$datas = array($testdata['data']);
		}
		if (is_array($testdata['out'])) {
			$outs = $testdata['out'];
		} else {
			$outs = array($testdata['out']);
		}
		if (!isset($testdata['err'])) {
			$errs = array(null);
		} elseif (is_array($testdata['err'])) {
			$errs = $testdata['err'];
		} else {
			$errs = array($testdata['err']);
		}
		$m = max(count($tpls), count($datas), count($outs), count($errs));
		while (count($tpls) < $m) {
			$tpls[] = end($tpls);
		}
		while (count($datas) < $m) {
			$datas[] = end($datas);
		}
		while (count($outs) < $m) {
			$outs[] = end($outs);
		}
		while (count($errs) < $m) {
			$errs[] = end($errs);
		}

		foreach ($tpls as $k => $template_string) {
			try {
				$tpl = \Mustache\Template::fromTemplateString($template_string);
				$rdr = TestMustacheRenderer::create($tpl);
				$result = $rdr->render($datas[$k]);
				if (!isset($errs[$k]) && $result === $outs[$k]) {
					$this->pass();
				} else {
					if (isset($errs[$k])) {
						$this->fail($test_id, '<error>', $result);
					} else {
						$this->fail($test_id, $outs[$k], $result);
					}
				}
			} catch (\Exception $e) {
				if (!isset($errs[$k])) {
					$this->fail($test_id, $outs[$k], '<'.get_class($e).': '.$e->getMessage().'>');
				} else {
					// TODO: check exception class/message
					$this->pass();
				}
			}
		}
		return true;
	}

	protected function runTests()
	{
		$test_id = 1;
		do {
			$result = $this->runTest($test_id);
			++$test_id;
		} while ($result !== static::NO_TEST);
	}

	public function run()
	{
		$this->tests = 0;
		$this->passed = 0;
		$this->failed = 0;

		if ($this->colour === null) {
			$this->colour = defined("STDOUT") && function_exists('posix_isatty') && posix_isatty(STDOUT);
		}

		if (!is_null($this->test_id)) {
			$this->runTest($this->test_id);
		} else {
			$this->runTests();
		}

		print "\n";

		if ($this->failures && $this->show_failures) {
			print "\n";
			foreach ($this->failures as $failure) {
				print str_repeat('-', 72) . "\n";
				printf("%sTest %04d %sfailed%s\n\n", $this->colour('bold'), $failure['test_id'], $this->colour('bold', 'red'), $this->colour('reset'));
				printf("%sExpected:%s\n%s\n", $this->colour('bold'), $this->colour('reset'), $failure['expected']);
				printf("%sActual:%s\n%s\n", $this->colour('bold'), $this->colour('reset'), $failure['actual']);
			}
			print str_repeat('-', 72) . "\n";
		}

		print "\n";

		$all_state = '';
		if (!$this->failed) {
			$all_state = ', all passed';
		} elseif (!$this->passed) {
			$all_state = ', all failed';
		}
		printf("%s%4d tests run%s\n%s", $this->colour($this->failed ? 'red' : 'green', 'reverse'), $this->tests, $all_state, $this->colour('reset'));
		if ($this->failed && $this->passed) {
			printf("  %s%4d passed%s\n",  $this->colour('green'),       $this->passed, $this->colour('reset'));
			printf("  %s%4d failed%s\n",  $this->colour('bold', 'red'), $this->failed, $this->colour('reset'));
		}
	}

}

$t = new DataTester(null, count($argv) > 1);
$t->run();
