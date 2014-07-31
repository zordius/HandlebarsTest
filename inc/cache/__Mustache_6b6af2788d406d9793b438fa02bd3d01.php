<?php

class __Mustache_6b6af2788d406d9793b438fa02bd3d01 extends Mustache_Template
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
        $buffer .= $indent . 'include this:
';
        if ($partial = $this->mustache->loadPartial('001-simple-vars')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . 'end include.
';
        $buffer .= $indent . 'section partial....
';
        // 'winners' section
        $value = $context->find('winners');
        $buffer .= $this->section2f14cd99daac269a3c0bff1ad1b6610d($context, $indent, $value);
        $buffer .= $indent . 'end section.
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'Winners: ';
        // 'winners' section
        $value = $context->find('winners');
        $buffer .= $this->section05ab2510ea03dd60e28fee6476fe662e($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'Partial1:';
        if ($partial = $this->mustache->loadPartial('001-simple-vars')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }
        $buffer .= '
';
        $buffer .= $indent . 'Partial2:';
        if ($partial = $this->mustache->loadPartial('001-simple-vars')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }
        $buffer .= '
';
        $buffer .= $indent . 'Partial3:';
        if ($partial = $this->mustache->loadPartial('001-simple-vars')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }
        $buffer .= '
';
        $buffer .= $indent . 'Partial4:';
        if ($partial = $this->mustache->loadPartial('001-simple-vars')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }
        $buffer .= '
';
        $buffer .= $indent . 'Partial5:';
        if ($partial = $this->mustache->loadPartial('001-simple-vars')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }
        $buffer .= '
';
        $buffer .= $indent . 'Partial6:';
        if ($partial = $this->mustache->loadPartial('001-simple-vars')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }
        $buffer .= '
';

        return $buffer;
    }

    private function section2f14cd99daac269a3c0bff1ad1b6610d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
  {{> 001-simple-vars}}
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
                if ($partial = $this->mustache->loadPartial('001-simple-vars')) {
                    $buffer .= $partial->renderInternal($context, $indent . '  ');
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
                $value = $this->resolveValue($context->find('this'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '(';
                $value = $this->resolveValue($context->find('this'), $context, $indent);
                $buffer .= $value;
                $buffer .= ') = ';
                $value = $this->resolveValue($context->last(), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
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
