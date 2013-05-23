<?php

class __Mustache_e55892debe2aec4cae22bda15818c475 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $this->resolveValue($context->find('grand_parent_id'), $context, $indent);
        $buffer .= $indent . htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= "\n";
        // 'parent_contexts' section
        $buffer .= $this->section71fe90fe216efd1fa56f4d68a47500a2($context, $indent, $context->find('parent_contexts'));

        return $buffer;
    }

    private function sectionB47e2732d8e27016c4df84c8a84d7a8b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
    {{child_id}} ({{parent_id}} << {{grand_parent_id}})
  ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '    ';
                $value = $this->resolveValue($context->find('child_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= ' (';
                $value = $this->resolveValue($context->find('parent_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= ' << ';
                $value = $this->resolveValue($context->find('grand_parent_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= ')';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section71fe90fe216efd1fa56f4d68a47500a2(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
  {{parent_id}} ({{grand_parent_id}})
  {{#child_contexts}}
    {{child_id}} ({{parent_id}} << {{grand_parent_id}})
  {{/child_contexts}}
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '  ';
                $value = $this->resolveValue($context->find('parent_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= ' (';
                $value = $this->resolveValue($context->find('grand_parent_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= ')';
                $buffer .= "\n";
                // 'child_contexts' section
                $buffer .= $this->sectionB47e2732d8e27016c4df84c8a84d7a8b($context, $indent, $context->find('child_contexts'));
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
