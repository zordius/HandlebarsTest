<?php
namespace Mustache;

require_once 'Renderer.php';

/**
 * This class is responsible for rendering a compiled Mustache-format
 * template to a PHP script. It ignores any data passed to it.
 */
class RendererPHP extends Renderer
{
	protected $in_php = false;
	protected $var_uniq = '';
	protected $var_id = 0;

	/**
	 * Create a renderer for the given template.
	 *
	 * @param \Mustache\Template $template  The template to be rendered.
	 */
	public function __construct(Template $template, $in_php = false)
	{
		parent::__construct($template);
		$this->in_php = $in_php;
	}

	/**
	 * Create a renderer for the given template.
	 *
	 * @param \Mustache\Template $template  The template to be rendered.
	 * @return \Mustache\Template
	 */
	public static function create(Template $template, $in_php = false)
	{
		return new static($template, $in_php);
	}

	/**
	 * Ensure that we are within a PHP block.
	 *
	 * @return string
	 */
	protected function openPhp()
	{
		if ($this->in_php) {
			return '';
		}
		$this->in_php = true;
		return '<?php ';
	}

	/**
	 * Ensure that we are not within a PHP block.
	 *
	 * @return string
	 */
	protected function closePhp()
	{
		if (!$this->in_php) {
			return '';
		}
		$this->in_php = false;
		return ' ?>';
	}

	/**
	 * Generate a unique variable name
	 *
	 * @return string
	 */
	protected function generateVarName($prefix = '')
	{
		if (!$this->var_uniq) {
			$this->var_uniq = substr(md5(mt_rand()), 1, 4);
		}
		$name = $this->var_uniq . (++$this->var_id);
		return '$'.$prefix.'_'.$name;
	}

	/**
	 * Internal helper function to render a block of uninterpreted text.
	 *
	 * @param string $text  The text to render.
	 * @return string
	 */
	protected function renderText($text)
	{
		return $this->closePhp() . strtr($text, array('<?'=>'<<?php echo \'?\' ?>', '?>'=>'<?php echo \'?\' ?>>'));
	}

	/**
	 * Render a variable from the given context.
	 *
	 * The result of this function will be HTML-encoded by default; set
	 * $encode to false to get the raw value.
	 *
	 * @param string  $var      The variable to be looked up
	 * @param array  &$context  The context to search
	 * @param bool    $encode   Whether to HTML-encode the result (default:
	 *                          true)
	 * @return mixed
	 *
	 * @see lookupVar()
	 */
	protected function renderVar($var, array &$context, $encode)
	{
		// sanitise $var
		$var = strtr($var, array('\'' => '\\\'', '\\' => '\\\\'));
		$result = $this->openPhp();
		$result .= '$d->'.($encode?'echo':'echoRaw').'(\'' . $var . '\');';
		return $result;
	}

	/**
	 * Internal helper function to render a section.
	 *
	 * @TODO: doesn't handle lambda $section values
	 *
	 * @param mixed  $section_var  The value of the section variable
	 * @param array &$renderlist   The rendering instructions for the section
	 * @param array &$context      The current variable context (outside the
	 *                             section)
	 * @param array &$opts         The current set of options
	 * @param array  $regular      Whether this is a regular section (true) or
	 *                             inverted (false)
	 * @return string
	 */
	protected function renderSection($section_var, array &$renderlist, array &$context, array &$opts, $regular)
	{
		$section_var = strtr($section_var, array('\'' => '\\\'', '\\' => '\\\\'));

		$sid = $this->generateVarName('sec');
		$sitem = $this->generateVarName('itm');

		$result = $this->openPhp();
		$result .= $sid.'='.($regular ? '' : '!').'$d->get(\'' . $section_var . '\');';
		// check if it's not falsy
		$result .= 'if('.$sid.'){';
		// if it's not an array, convert it
		$result .= 'if(!is_array('.$sid.')&&!('.$sid.' instanceof Traversable))'.$sid.'=array('.$sid.');';
		// loop over the section
		$result .= 'foreach('.$sid.' as '.$sitem.'){';
		// push the variable context
		$result .= '$d->push('.$sitem.');';
		// render the section content
		$result .= $this->renderList($renderlist, $context, $opts);
		// ensure we're back in PHP mode
		$result .= $this->openPhp();
		// pop the variable context
		$result .= '$d->pop();';
		// end the loop
		$result .= '}';
		// end the falsy check
		$result .= '}';

		return $result;
	}

	/**
	 * Internal helper function to render a capture section.
	 *
	 * A capture section renders its content, but stores it in the given
	 * variable name in the current context scope and returns nothing.
	 *
	 * @param mixed  $section_var  The name of the storage variable
	 * @param array &$renderlist   The rendering instructions for the section
	 * @param array &$context      The current variable context (outside the
	 *                             section)
	 * @param array &$opts         The current set of options
	 * @return string
	 */
	protected function renderCapture($section_var, array &$renderlist, array &$context, array &$opts)
	{
		$this->putVar(
			$section_var,
			$context,
			$this->renderList($renderlist, $context, $opts)
		);
		return '';
	}

	/**
	 * Fetch the template content for a given partial name.
	 *
	 * @param string  The partial name
	 * @return string
	 */
	protected function fetchPartialContent($partial)
	{
		return "«partial {$partial}»";
	}

}
