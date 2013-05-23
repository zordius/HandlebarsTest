<?php

class __Mustache_5e9a003cf378dabb602ce3c3e85bc704 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . 'Hello ';
        $value = $this->resolveValue($context->findDot('winner.name'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= ', you have just won $';
        $value = $this->resolveValue($context->findDot('winner.value'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= '!';
        $buffer .= "\n";
        $buffer .= $indent . 'We have $';
        $value = $this->resolveValue($context->findDot('award.first.value'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= ' for ';
        $value = $this->resolveValue($context->findDot('award.first.name'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= ' award!!';
        $buffer .= "\n";
        $buffer .= $indent . 'Raw dot test: ';
        $value = $this->resolveValue($context->findDot('winner.name'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= ' ';
        $value = $this->resolveValue($context->findDot('award.first.value'), $context, $indent);
        $buffer .= $value;
        $buffer .= ' for ';
        $value = $this->resolveValue($context->findDot('award.first.name'), $context, $indent);
        $buffer .= $value;
        $buffer .= "\n";

        return $buffer;
    }
}
