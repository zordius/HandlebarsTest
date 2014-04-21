<?php

class __Mustache_df5cf00d106434bc407e123931b9ce07 extends Mustache_Template
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
        $buffer .= $indent . 'Hello original ';
        $value = $this->resolveValue($context->find('name'), $context, $indent);
        $buffer .= $value;
        $buffer .= ' , the value is ';
        $value = $this->resolveValue($context->find('value'), $context, $indent);
        $buffer .= $value;
        $buffer .= '
';

        return $buffer;
    }
}
