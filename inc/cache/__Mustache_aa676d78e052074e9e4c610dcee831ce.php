<?php

class __Mustache_aa676d78e052074e9e4c610dcee831ce extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . 'Hello ';
        $value = $this->resolveValue($context->findDot('winner.name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ', you have just won $';
        $value = $this->resolveValue($context->findDot('winner.value'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '!
';
        $buffer .= $indent . 'We have $';
        $value = $this->resolveValue($context->findDot('award.first.value'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' for ';
        $value = $this->resolveValue($context->findDot('award.first.name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' award!!
';
        $buffer .= $indent . 'Raw dot test: ';
        $value = $this->resolveValue($context->findDot('winner.name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' ';
        $value = $this->resolveValue($context->findDot('award.first.value'), $context, $indent);
        $buffer .= $value;
        $buffer .= ' for ';
        $value = $this->resolveValue($context->findDot('award.first.name'), $context, $indent);
        $buffer .= $value;
        $buffer .= '
';

        return $buffer;
    }
}
