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
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('winners')), null, $in, false, function($cx, $in) {return '  - EACH 1- '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).'
';}).'end section.

##1 start each:
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('winners')), null, $in, true, function($cx, $in) {return '  - EACH 2 - '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).'
';}).'end each.

##3 Index
Index ?: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('winners','name'))).'
Index 0: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('winners','0','name'))).'
Index 1: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('winners','1','name'))).'
';
}; ?>