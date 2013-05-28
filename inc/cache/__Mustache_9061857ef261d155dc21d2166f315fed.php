<?php

class __Mustache_9061857ef261d155dc21d2166f315fed extends Mustache_Template
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
        $buffer .= $indent . 'include this:';
        $buffer .= "\n";
        if ($partial = $this->mustache->loadPartial('001-simple-vars')) {
            $buffer .= $partial->renderInternal($context, '    ');
        }
        $buffer .= $indent . 'end include.';
        $buffer .= "\n";
        $buffer .= $indent . 'section partial....';
        $buffer .= "\n";
        // 'winners' section
        $buffer .= $this->section2f14cd99daac269a3c0bff1ad1b6610d($context, $indent, $context->find('winners'));
        $buffer .= $indent . 'end section.';
        $buffer .= "\n";
        $buffer .= "\n";
        $buffer .= $indent . 'Winners: ';
        // 'winners' section
        $buffer .= $this->section05ab2510ea03dd60e28fee6476fe662e($context, $indent, $context->find('winners'));
        $buffer .= "\n";

        return $buffer;
    }

    private function section2f14cd99daac269a3c0bff1ad1b6610d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
  {{> 001-simple-vars}}
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                if ($partial = $this->mustache->loadPartial('001-simple-vars')) {
                    $buffer .= $partial->renderInternal($context, '  ');
                }
                $context->pop();
            }
        }
    
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
