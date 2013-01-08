<?php
namespace Mustache;

abstract class Cache
{
	protected $fallback = null;

	public function __construct($fallback = null) {
		$this->setFallback($fallback);
	}

	public abstract function get($key);
	public abstract function put($key, $data, $lifetime = null, $flags = null);
	public abstract function purge($key);

	protected function fallbackGet($key)
	{
		$f = $this->getFallback();
		if (is_callable($f)) {
			return $f($key);
		}
		if ($f instanceof Cache) {
			return $f->get($key);
		}
		return null;
	}

	protected function fallbackPut($key, $data, $lifetime = null, $flags = null)
	{
		$f = $this->getFallback();
		if ($f instanceof Cache) {
			return $f->put($key, $data, $lifetime, $flags);
		}
		return false;
	}

	protected function fallbackPurge($key)
	{
		$f = $this->getFallback();
		if ($f instanceof Cache) {
			return $f->purge($key);
		}
		return false;
	}

	public function getFallback()
	{
		return $this->fallback;
	}

	public function setFallback($fallback)
	{
		if (!is_null($fallback) && !is_callable($fallback) && !$fallback instanceof Cache) {
			throw new InvalidArgumentException('Fallback must either be null, callable, or a subclass of \\Mustache\\Cache');
		}
		$this->fallback = $fallback;
		return $this;
	}

	public function setUltimateFallback($fallback)
	{
		if (!is_null($fallback) && !is_callable($fallback) && !$fallback instanceof Cache) {
			throw new InvalidArgumentException('Fallback must either be null, callable, or a subclass of \\Mustache\\Cache');
		}
		if ($this->fallback instanceof Cache) {
			$this->fallback->setUltimateFallback($fallback);
		} else {
			$this->fallback = $fallback;
		}
		return $this;
	}

}
