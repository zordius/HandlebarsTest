<?php

class __Mustache_947b649702d6804b41ccce98462543dd extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . 'Hello ';
        $value = $this->resolveValue($context->find('name'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= ', you have just won $';
        $value = $this->resolveValue($context->find('value'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= '!';
        $buffer .= "\n";
        $buffer .= $indent . 'Winners: ';
        // 'winners' section
        $buffer .= $this->section05ab2510ea03dd60e28fee6476fe662e($context, $indent, $context->find('winners'));
        $buffer .= "\n";

        return $buffer;
    }

    private function section05ab2510ea03dd60e28fee6476fe662e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '{{this}}({{{this}}}) = {{.}}({{{.}}})';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $value = $this->resolveValue($context->find('this'), $context, $indent);
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= '(';
                $value = $this->resolveValue($context->find('this'), $context, $indent);
                $buffer .= $value;
                $buffer .= ') = ';
                $value = $this->resolveValue($context->last(), $context, $indent);
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= '(';
                $value = $this->resolveValue($context->last(), $context, $indent);
                $buffer .= $value;
                $buffer .= ')';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
