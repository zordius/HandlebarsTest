<?php use \LightnCandy\SafeString as SafeString;use \LightnCandy\Runtime as LR;return function ($in = null, $options = null) {
    $helpers = array(            'helper1' => function($arg0 = null, $arg1 = null) {
        $u = ($arg0 !== null) ? $arg0 : 'undefined';
        $t = ($arg1 !== null) ? $arg1 : 'undefined';
        return "<a href=\"{$u}\">{$t}</a>";
    },
            'helper2' => function($options) {
        $named = $options['hash'];
        $u = isset($named['url']) ? jsraw($named['url']) : 'undefined';
        $t = isset($named['text']) ? jsraw($named['text']) : 'undefined';
        $x = isset($named['ur"l']) ? $named['ur"l'] : 'undefined';
        return "<a href=\"{$u}\">{$t}</a>({$x})";
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

. Test 1: '.LR::raw($cx, LR::hbch($cx, 'helper1', array(array(LR::v($cx, $in, isset($in) ? $in : null, array('url')),'this is a test & OK'),array()), 'raw', $in)).' !!
. Test 2: '.LR::raw($cx, LR::hbch($cx, 'helper1', array(array(LR::v($cx, $in, isset($in) ? $in : null, array('url')),'this is a test'),array()), 'raw', $in)).' !!
. Test 3: '.LR::encq($cx, LR::hbch($cx, 'helper1', array(array(LR::v($cx, $in, isset($in) ? $in : null, array('url')),'this is a test & OK'),array()), 'encq', $in)).' !!
. Test 3: '.LR::encq($cx, LR::hbch($cx, 'helper1', array(array(LR::v($cx, $in, isset($in) ? $in : null, array('url')),'string/arg.css'),array()), 'encq', $in)).' !!
. Test 4: '.LR::encq($cx, LR::hbch($cx, 'helper1', array(array(LR::v($cx, $in, isset($in) ? $in : null, array('url')),'this is a test'),array()), 'encq', $in)).' !!
. Test 5: '.LR::encq($cx, LR::hbch($cx, 'helper2', array(array(),array('url'=>LR::v($cx, $in, isset($in) ? $in : null, array('url')),'text'=>'this is a test')), 'encq', $in)).' !!
. Test 6: '.LR::encq($cx, LR::hbch($cx, 'helper2', array(array(),array('ur"l'=>LR::v($cx, $in, isset($in) ? $in : null, array('url')),'text'=>'this is a test')), 'encq', $in)).' !!
. Test 7: '.LR::encq($cx, LR::hbch($cx, 'helper2', array(array(),array('url'=>0,'text'=>10)), 'encq', $in)).' !!
. Test 8: '.LR::encq($cx, LR::hbch($cx, 'helper2', array(array(),array('url'=>-1,'text'=>1.3)), 'encq', $in)).' !!
. Test 9: '.LR::encq($cx, LR::hbch($cx, 'helper2', array(array(),array('url'=>true,'text'=>false)), 'encq', $in)).' !!
';
}; ?>