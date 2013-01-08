<?php

require '../src/Template.php';
require '../src/Renderer.php';

class TestMustacheRenderer extends \Mustache\Renderer
{
	protected function fetchPartialContent($partial)
	{
		return "«partial {$partial}»";
	}
}

$tpl = \Mustache\Template::fromTemplateString('This is a {{test}}');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));
var_dump($rdr->render(array('test'=>'test')));
var_dump($rdr->render(array('test'=>'test with <b>html</b>')));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('This is a {{{test}}}');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));
var_dump($rdr->render(array('test'=>'test')));
var_dump($rdr->render(array('test'=>'test with <b>html</b>')));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('This is a {{& test}}');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));
var_dump($rdr->render(array('test'=>'test')));
var_dump($rdr->render(array('test'=>'test with <b>html</b>')));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('{{test}}This is a {{test}}');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));
var_dump($rdr->render(array('test'=>'test')));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('{{test}}This is a {{&test}}{{test}}');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array('test'=>'test')));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('{{test}}{{foo}}This is a {{&foo}}{{&test}}{{test}}{{{foo}}}');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array('test'=>'test')));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('Test {{>test}} partially {{> partial}}');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array('test'=>'test')));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('Test {{#test}}non-{{.}}-empty{{/test}}{{^test}}empty{{/test}}.');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));
var_dump($rdr->render(array('test'=>'test')));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('Test{{#foo}} foo{{#bar}} bar {{/bar}}foo{{/foo}}.{{#bar}} Outer bar{{/bar}}');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));
var_dump($rdr->render(array('foo'=>true)));
var_dump($rdr->render(array('bar'=>true)));
var_dump($rdr->render(array('foo'=>true, 'bar'=>true)));
var_dump($rdr->render(array('foo'=>array('bar'=>true))));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('start:{{#person}} [ name: {{name}} ]{{/person}}');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));
var_dump($rdr->render(array('person'=>array(
	array('name' => 'Alice'),
))));
var_dump($rdr->render(array('person'=>array(
	array('name' => 'Alice'),
	array('name' => 'Bob'),
	array('name' => 'Carol'),
	array('name' => 'Derek'),
	array('name' => 'Edna'),
))));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('{{!comment here}}* |{{default_tags}}| @{{=<% %>=}}@ {{/<% erb_tags %>/}} +<%={{ }}=%>+ @@{{default_tags_again}}@@');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('do {{re}} {{mi.fa}} sol {{la.ti.do}}!');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));
var_dump($rdr->render(array('re' => 'RAY')));
var_dump($rdr->render(array('re' => 'RAY', 'mi'=>'mi')));
var_dump($rdr->render(array('re' => 'RAY', 'mi'=>array('fa'=>'ME FAR'))));
var_dump($rdr->render(array('re' => 'RAY', 'mi'=>array('fa'=>'ME FAR'), 'la'=>array('ti'=>'LARTEE', 'do'=>'DOUGH'))));
var_dump($rdr->render(array('re' => 'RAY', 'mi'=>array('fa'=>'ME FAR'), 'la'=>array('ti'=>array('do'=>'LARTEE DOUGH')))));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('sec: {{#a}}[{{b}}] ({{b.c}}) {{d}}{{/a}} {{c}}!');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));
var_dump($rdr->render(array('a' => array(array('b'=>array('c'=>'C'))), 'c'=>'SEE', 'd'=>'DEE')));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('Test {{>test arg1=foo bar=baz}} partially {{> partial foo="bar bar" baz="quux"}} {{>another partial=arg }}');
$rdr = TestMustacheRenderer::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));
