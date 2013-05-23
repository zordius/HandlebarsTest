<?php

class __Mustache_31a521025e89b8f2bc4bbb576a65332c extends Mustache_Template
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
        $buffer .= $indent . '<ul>';
        $buffer .= "\n";
        // 'people' section
        $buffer .= $this->sectionD344a5a328801db6f5d4db6332c1f2a7($context, $indent, $context->find('people'));
        $buffer .= $indent . '</ul>';
        $buffer .= "\n";
        $value = $this->resolveValue($context->find('end'), $context, $indent);
        $buffer .= $indent . htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= "\n";

        return $buffer;
    }

    private function sectionD344a5a328801db6f5d4db6332c1f2a7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
 <li>{{name}} is a {{gender}}</li>
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . ' <li>';
                $value = $this->resolveValue($context->find('name'), $context, $indent);
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= ' is a ';
                $value = $this->resolveValue($context->find('gender'), $context, $indent);
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= '</li>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
