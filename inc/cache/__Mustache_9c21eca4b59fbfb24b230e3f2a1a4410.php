<?php

class __Mustache_9c21eca4b59fbfb24b230e3f2a1a4410 extends Mustache_Template
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
        $buffer .= $indent . '. ';
        $value = $this->resolveValue($context->find('[!]'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' !!
';
        $buffer .= $indent . '. KAKA ';
        $value = $this->resolveValue($context->findDot('[! # % & ( ) * + , . / ; < = > @ [ \\ ^ ` { | } ~]'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '
';
        $buffer .= $indent . '. K ';
        $value = $this->resolveValue($context->find('[![]'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' X
';
        $buffer .= $indent . '. Hello ';
        $value = $this->resolveValue($context->findDot('winners.0.name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' !! Won $';
        $value = $this->resolveValue($context->findDot('winners.0.value'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' now~~
';
        $buffer .= $indent . '. Hello ';
        $value = $this->resolveValue($context->findDot('winners.1.name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' !! Won $';
        $value = $this->resolveValue($context->findDot('winners.1.value'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' later~~
';
        $buffer .= $indent . '. No ';
        $value = $this->resolveValue($context->findDot('winners.[!].name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' !!
';

        return $buffer;
    }
}
