<?php

class __Mustache_49c71d09056ac637fe53fda4e4dbb308 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . 'Hello ';
        $value = $this->resolveValue($context->find('name'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= ', you have just won $';
        $value = $this->resolveValue($context->find('value'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= '!';
        $buffer .= "\n";
        $buffer .= $indent . 'Hello original ';
        $value = $this->resolveValue($context->find('name'), $context, $indent);
        $buffer .= $value;
        $buffer .= ', the value is ';
        $value = $this->resolveValue($context->find('value'), $context, $indent);
        $buffer .= $value;
        $buffer .= "\n";

        return $buffer;
    }
}
