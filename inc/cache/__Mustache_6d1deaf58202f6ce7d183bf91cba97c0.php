<?php

class __Mustache_6d1deaf58202f6ce7d183bf91cba97c0 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '', $escape = false)
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<h1>';
        $value = $context->find('header');
        if (!is_string($value) && is_callable($value)) {
            $value = $this->mustache
                ->loadLambda((string) call_user_func($value))
                ->renderInternal($context, $indent);
        }
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= '</h1>';
        $buffer .= "\n";
        // 'notEmpty' section
        $buffer .= $this->section2b1a20b84b0b55625ca0bbbf3cc09d94($context, $indent, $context->find('notEmpty'));
        // 'isEmpty' section
        $buffer .= $this->sectionF550575e4e34a5532c59cd1f5043dbca($context, $indent, $context->find('isEmpty'));

        if ($escape) {
            return htmlspecialchars($buffer, ENT_COMPAT, 'UTF-8');
        } else {
            return $buffer;
        }
    }

    private function section1096a61e8b971bb54566a3e90a3bc4fd(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <li><strong>{{name}}</strong></li>
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '    <li><strong>';
                $value = $context->find('name');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= '</strong></li>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8ba18b952216f53ff741499bde665a38(Mustache_Context $context, $indent, $value) {
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
                ->renderInternal($context, $indent);
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
                    $value = $context->find('url');
                    if (!is_string($value) && is_callable($value)) {
                        $value = $this->mustache
                            ->loadLambda((string) call_user_func($value))
                            ->renderInternal($context, $indent);
                    }
                    $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                    $buffer .= '">';
                    $value = $context->find('name');
                    if (!is_string($value) && is_callable($value)) {
                        $value = $this->mustache
                            ->loadLambda((string) call_user_func($value))
                            ->renderInternal($context, $indent);
                    }
                    $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                    $buffer .= '</a></li>';
                    $buffer .= "\n";
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2b1a20b84b0b55625ca0bbbf3cc09d94(Mustache_Context $context, $indent, $value) {
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
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '<ul>';
                $buffer .= "\n";
                // 'item' section
                $buffer .= $this->section8ba18b952216f53ff741499bde665a38($context, $indent, $context->find('item'));
                $buffer .= $indent . '</ul>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF550575e4e34a5532c59cd1f5043dbca(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
<p>The list is empty.</p>
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '<p>The list is empty.</p>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }
}