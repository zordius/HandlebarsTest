<?php

class __Mustache_cba94d1520dfd7e25328f60f40c16385 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . 'Hello ';
        $value = $this->resolveValue($context->find('name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ', you have just won $';
        $value = $this->resolveValue($context->find('value'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '!
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '. Test 1: ';
        $value = $this->resolveValue($context->find('helper1 url "this is a test & OK"'), $context, $indent);
        $buffer .= $value;
        $buffer .= ' !!
';
        $buffer .= $indent . '. Test 2: ';
        $value = $this->resolveValue($context->find('[helper1] url "this is a test"'), $context, $indent);
        $buffer .= $value;
        $buffer .= ' !!
';
        $buffer .= $indent . '. Test 3: ';
        $value = $this->resolveValue($context->find('helper1  url  "this is a test & OK"'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' !!
';
        $buffer .= $indent . '. Test 3: ';
        $value = $this->resolveValue($context->findDot('helper1  url  "string/arg.css"'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' !!
';
        $buffer .= $indent . '. Test 4: ';
        $value = $this->resolveValue($context->find('[helper1]	url "this is a test"'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' !!
';
        $buffer .= $indent . '. Test 5: ';
        $value = $this->resolveValue($context->find('helper2	url=url text="this is a test"'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' !!
';
        $buffer .= $indent . '. Test 6: ';
        $value = $this->resolveValue($context->find('helper2	[ur"l]=url text="this is a test"'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' !!
';
        $buffer .= $indent . '. Test 7: ';
        $value = $this->resolveValue($context->find('helper2 url=0 text=10'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' !!
';
        $buffer .= $indent . '. Test 8: ';
        $value = $this->resolveValue($context->findDot('helper2 url=-1 text=1.3'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' !!
';

        return $buffer;
    }
}
