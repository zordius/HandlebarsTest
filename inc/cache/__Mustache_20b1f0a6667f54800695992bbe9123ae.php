<?php

class __Mustache_20b1f0a6667f54800695992bbe9123ae extends Mustache_Template
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
        // 'test' section
        $value = $context->find('test');
        $buffer .= $this->section1126f26395cf6acb5fe19d6643eec7b5($context, $indent, $value);

        return $buffer;
    }

    private function section1126f26395cf6acb5fe19d6643eec7b5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '{{! when test is true, print one more line... }}
This is true! won ${{value}}!!
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
                $buffer .= $indent . 'This is true! won $';
                $value = $this->resolveValue($context->find('value'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '!!
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
