<?php

class __Mustache_8af8ccc4f81af6b7e5f21a911dcc12e5 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . 'Hello ';
        $value = $this->resolveValue($context->find('name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ', you have just won $';
        $value = $this->resolveValue($context->find('value'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '!
';
        $buffer .= $indent . '<ul>
';
        // 'people' section
        $value = $context->find('people');
        $buffer .= $this->sectionD344a5a328801db6f5d4db6332c1f2a7($context, $indent, $value);
        $buffer .= $indent . '</ul>
';
        $value = $this->resolveValue($context->find('end'), $context, $indent);
        $buffer .= $indent . htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '
';

        return $buffer;
    }

    private function sectionD344a5a328801db6f5d4db6332c1f2a7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
 <li>{{name}} is a {{gender}}</li>
';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . ' <li>';
                $value = $this->resolveValue($context->find('name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= ' is a ';
                $value = $this->resolveValue($context->find('gender'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
