<?php use \LightnCandy\SafeString as SafeString;use \LightnCandy\Runtime as LR;return function ($in = null, $options = null) {
    $helpers = array(            'helper1' => function($arg0 = null, $arg1 = null) {
        $u = ($arg0 !== null) ? $arg0 : 'undefined';
        $t = ($arg1 !== null) ? $arg1 : 'undefined';
        return "<a href=\"{$u}\">{$t}</a>";
    },
);
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

. Test 1: '.((LR::ifvar($cx, '', false)) ? 'OK' : '').' !!
. Test 2: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test','a b'))).' !!
. Test 3: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('te"st','cd'))).' !!
. Test 4: '.((LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('te"st')), false)) ? 'OK' : '').' !!
. Test 5: '.LR::raw($cx, LR::hbch($cx, 'helper1', array(array(LR::v($cx, $in, isset($in) ? $in : null, array('url')),'this is a test & OK'),array()), 'raw', $in)).' !!
. Test 6: '.LR::raw($cx, LR::hbch($cx, 'helper1', array(array(LR::v($cx, $in, isset($in) ? $in : null, array('url')),'this is a test'),array()), 'raw', $in)).' !!
. Test 7: '.LR::encq($cx, LR::hbch($cx, 'helper1', array(array(LR::v($cx, $in, isset($in) ? $in : null, array('url')),'this is a test & OK'),array()), 'encq', $in)).' !!
. Test 8: '.LR::encq($cx, LR::hbch($cx, 'helper1', array(array(LR::v($cx, $in, isset($in) ? $in : null, array('url')),'this is a test'),array()), 'encq', $in)).' !!
. Test 9: '.LR::encq($cx, LR::hbch($cx, 'helper1', array(array(LR::v($cx, $in, isset($in) ? $in : null, array('url')),'this.is.atest'),array()), 'encq', $in)).' !!
';
}; ?>