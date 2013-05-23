<?php

class __Mustache_4e50adfded733350c537cd42f368dc15 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . 'Hello ';
        $value = $this->resolveValue($context->findDot('winner.name'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= ', you have just won $';
        $value = $this->resolveValue($context->findDot('winner.value'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= '!';
        $buffer .= "\n";
        // 'test' section
        $buffer .= $this->section5e8c319752e287819bb1c590da158249($context, $indent, $context->find('test'));
        $buffer .= $indent . 'This is a test, test = ';
        $value = $this->resolveValue($context->find('test'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= "\n";
        // 'test' section
        $buffer .= $this->section3ad155fd24143ea0ced62cfde7b56c65($context, $indent, $context->find('test'));
        // 'test' inverted section
        $value = $context->find('test');
        if (empty($value)) {
            
            $buffer .= $indent . 'Line 3';
            $buffer .= "\n";
        }
        // 'test' inverted section
        $value = $context->find('test');
        if (empty($value)) {
            
            $buffer .= $indent . 'Line 4';
            $buffer .= "\n";
        }
        // 'test' section
        $buffer .= $this->sectionCd625e8a4625d69f5611e6128bd09ef2($context, $indent, $context->find('test'));
        // 'test' inverted section
        $value = $context->find('test');
        if (empty($value)) {
            
            $buffer .= $indent . 'Line 6';
            $buffer .= "\n";
        }
        $buffer .= $indent . '---- double section ----';
        $buffer .= "\n";
        // 'sec' section
        $buffer .= $this->sectionC5a0a446f49a1f9ef67574a660c63193($context, $indent, $context->find('sec'));

        return $buffer;
    }

    private function section5e8c319752e287819bb1c590da158249(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
Line 1
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . 'Line 1';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3ad155fd24143ea0ced62cfde7b56c65(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
Line 2
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . 'Line 2';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionCd625e8a4625d69f5611e6128bd09ef2(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
Line 5
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . 'Line 5';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBe02ec176ac7c0878e74c2d7927c2ea6(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '-- {{name}}, {{value}}--';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '-- ';
                $value = $this->resolveValue($context->find('name'), $context, $indent);
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= ', ';
                $value = $this->resolveValue($context->find('value'), $context, $indent);
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= '--';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC5a0a446f49a1f9ef67574a660c63193(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
{{name}}:{{value}}
{{#sec}}-- {{name}}, {{value}}--{{/sec}}
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $value = $this->resolveValue($context->find('name'), $context, $indent);
                $buffer .= $indent . htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= ':';
                $value = $this->resolveValue($context->find('value'), $context, $indent);
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= "\n";
                // 'sec' section
                $buffer .= $this->sectionBe02ec176ac7c0878e74c2d7927c2ea6($context, $indent, $context->find('sec'));
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
