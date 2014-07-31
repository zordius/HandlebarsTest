<?php

class __Mustache_94e6c3f34fbc67cdd1d4194b8d5d88cd extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $value = $this->resolveValue($context->find('helper1 url (helper1 url2 text)'), $context, $indent);
        $buffer .= $indent . $value;
        $buffer .= '
';
        $buffer .= $indent . '
';

        return $buffer;
    }
}
