<?php

class __Mustache_faa9e14292f03457a91d4ca3408b8aba extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $this->resolveValue($context->find('grand_parent_id'), $context, $indent);
        $buffer .= $indent . htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '
';
        // 'parent_contexts' section
        $value = $context->find('parent_contexts');
        $buffer .= $this->section71fe90fe216efd1fa56f4d68a47500a2($context, $indent, $value);

        return $buffer;
    }

    private function sectionB47e2732d8e27016c4df84c8a84d7a8b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
    {{child_id}} ({{parent_id}} << {{grand_parent_id}})
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
                $buffer .= $indent . '    ';
                $value = $this->resolveValue($context->find('child_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= ' (';
                $value = $this->resolveValue($context->find('parent_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= ' << ';
                $value = $this->resolveValue($context->find('grand_parent_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= ')
';
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
                $buffer .= $indent . '  ';
                $value = $this->resolveValue($context->find('parent_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= ' (';
                $value = $this->resolveValue($context->find('grand_parent_id'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= ')
';
                // 'child_contexts' section
                $value = $context->find('child_contexts');
                $buffer .= $this->sectionB47e2732d8e27016c4df84c8a84d7a8b($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
