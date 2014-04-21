<?php

class __Mustache_f2f82da334ef6dd9a135031437f8a54c extends Mustache_Template
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
        $buffer .= $indent . 'This is next line.';
        $value = $this->resolveValue($context->find('empty_var'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '中文
';
        $buffer .= $indent . 'Test \\on \'spacing in mustache: Hello ';
        $value = $this->resolveValue($context->find('name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ', you have just won $';
        $value = $this->resolveValue($context->find('value'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '!
';

        return $buffer;
    }
}
