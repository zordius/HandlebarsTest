<?php

class __Mustache_af56cea15ba7139a324e6d0c0c34962e extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<h1>';
        $value = $this->resolveValue($context->find('header'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</h1>
';
        // 'notEmpty' section
        $buffer .= $this->section2b1a20b84b0b55625ca0bbbf3cc09d94($context, $indent, $context->find('notEmpty'));
        // 'isEmpty' section
        $buffer .= $this->sectionF550575e4e34a5532c59cd1f5043dbca($context, $indent, $context->find('isEmpty'));

        return $buffer;
    }

    private function section1096a61e8b971bb54566a3e90a3bc4fd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <li><strong>{{name}}</strong></li>
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '    <li><strong>';
                $value = $this->resolveValue($context->find('name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</strong></li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8ba18b952216f53ff741499bde665a38(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
{{#current}}
    <li><strong>{{name}}</strong></li>
{{/current}}
{{^current}}
    <li><a href="{{url}}">{{name}}</a></li>
{{/current}}
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                // 'current' section
                $buffer .= $this->section1096a61e8b971bb54566a3e90a3bc4fd($context, $indent, $context->find('current'));
                // 'current' inverted section
                $value = $context->find('current');
                if (empty($value)) {
                    
                    $buffer .= $indent . '    <li><a href="';
                    $value = $this->resolveValue($context->find('url'), $context, $indent);
                    $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                    $buffer .= '">';
                    $value = $this->resolveValue($context->find('name'), $context, $indent);
                    $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                    $buffer .= '</a></li>
';
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2b1a20b84b0b55625ca0bbbf3cc09d94(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
<ul>
{{#item}}
{{#current}}
    <li><strong>{{name}}</strong></li>
{{/current}}
{{^current}}
    <li><a href="{{url}}">{{name}}</a></li>
{{/current}}
{{/item}}
</ul>
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '<ul>
';
                // 'item' section
                $buffer .= $this->section8ba18b952216f53ff741499bde665a38($context, $indent, $context->find('item'));
                $buffer .= $indent . '</ul>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF550575e4e34a5532c59cd1f5043dbca(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
<p>The list is empty.</p>
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '<p>The list is empty.</p>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
