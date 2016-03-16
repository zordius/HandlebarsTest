<?php use \LightnCandy\SafeString as SafeString;use \LightnCandy\Runtime as LR;return function ($in = null, $options = null) {
    $helpers = array();
    $partials = array();
    $cx = array(
        'flags' => array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'lambda' => false,
            'mustlok' => false,
            'mustlam' => false,
            'echo' => false,
            'partnc' => false,
            'knohlp' => false,
            'debug' => isset($options['debug']) ? $options['debug'] : 1,
        ),
        'constants' => array(),
        'helpers' => isset($options['helpers']) ? array_merge($helpers, $options['helpers']) : $helpers,
        'partials' => isset($options['partials']) ? array_merge($partials, $options['partials']) : $partials,
        'scopes' => array(),
        'sp_vars' => isset($options['data']) ? array_merge(array('root' => $in), $options['data']) : array('root' => $in),
        'blparam' => array(),
        'partialid' => 0,
        'runtime' => '\LightnCandy\Runtime',
    );
    
    return 'Hello '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).', you have just won $'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).'!

##0 start section:
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('winners')), null, $in, false, function($cx, $in) {return '  - EACH 1 - '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).' ~ '.LR::encq($cx, LR::v($cx, $in, isset($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1] : null, array('name'))).'
'.'  Name:'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).', Value:'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).', This: '.LR::encq($cx, $in).', Test: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test'))).'
'.'  - EACH 2- '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).' ~ '.LR::encq($cx, LR::v($cx, $in, isset($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1] : null, array('name'))).'
';}).'end section.

##1 start each:
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('winners')), null, $in, true, function($cx, $in) {return '  - EACH 3 - '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).' ~ '.LR::encq($cx, LR::v($cx, $in, isset($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1] : null, array('name'))).'
'.'  Name:'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).', Value:'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).', This: '.LR::encq($cx, $in).', Test: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test'))).'
'.'  - EACH 4 - '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).' ~ '.LR::encq($cx, LR::v($cx, $in, isset($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1] : null, array('name'))).'
';}).'end each.

##2 start each+if:
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('winners')), null, $in, true, function($cx, $in) {return ''.((LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test')), false)) ? ''.'  Name:'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).', Value:'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).', This: '.LR::encq($cx, $in).', Test: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test'))).'
'.'' : '').'';}).'end each+if.

##3 start each+if+with:
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('winners')), null, $in, true, function($cx, $in) {return ''.((LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test')), false)) ? ''.LR::wi($cx, LR::v($cx, $in, isset($in) ? $in : null, array('people')), null, $in, function($cx, $in) {return ''.'   Name:'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).', Value:'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).', This: '.LR::encq($cx, $in).', Test: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test'))).'
'.'';}).'' : '').'';}).'end each+if+with.

##4 start each+with+if:
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('winners')), null, $in, true, function($cx, $in) {return ''.LR::wi($cx, LR::v($cx, $in, isset($in) ? $in : null, array('people')), null, $in, function($cx, $in) {return ''.((LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test')), false)) ? ''.'   Name:'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).', Value:'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).', This: '.LR::encq($cx, $in).', Test: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test'))).'
'.'' : '').'';}).'';}).'end each+with+if.
';
}; ?>