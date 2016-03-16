<?php use \LightnCandy\SafeString as SafeString;use \LightnCandy\Runtime as LR;return function ($in = null, $options = null) {
    $helpers = array(            'helper3' => function() {
        $args = func_get_args();
        $options = array_pop($args);
        return $options['fn'](array('test1', 'test2', 'test3'));
    },
            'helper4' => function($options) {
        if (isset($options['hash']['val'])) {
            $options['_this']['helper4_value'] = $options['hash']['val'] % 2;
            return $options['fn']($options['_this']);
        }
        if (isset($options['hash']['odd'])) {
            return $options['fn'](array(1,3,5,7,9));
        }
        return '';
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

. Test 1: '.LR::hbch($cx, 'helper3', array(array(LR::v($cx, $in, isset($in) ? $in : null, array('people'))),array()), $in, false, function($cx, $in) {return '<li>'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).' -> '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).'</li>';}).'
. Test 2: '.LR::hbch($cx, 'helper4', array(array('people'),array()), $in, false, function($cx, $in) {return '
  <li>'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).' -> '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).'</li>
';}).'
. Test 3: '.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('people')), null, $in, true, function($cx, $in) {return '
  NOTE A: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).' : '.LR::encq($cx, $in).' != '.LR::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).'
S~'.LR::encq($cx, $in).'~'.LR::hbch($cx, 'helper3', array(array(),array()), $in, false, function($cx, $in) {return '
  NOTE B: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).' : '.LR::encq($cx, $in).' != '.LR::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).'
';}).'E
';}).'
. Test 4: '.LR::hbch($cx, 'helper3', array(array(),array()), $in, false, function($cx, $in) {return 'ABC';}).'

. Test 5: '.LR::hbch($cx, 'helper4', array(array(),array('val'=>123,'odd'=>1)), $in, false, function($cx, $in) {return '~~~'.LR::encq($cx, $in).'~~~';}).'

. Test 6: '.LR::hbch($cx, 'helper4', array(array(),array('val'=>LR::v($cx, $in, isset($in) ? $in : null, array('people')),'odd'=>LR::v($cx, $in, isset($in) ? $in : null, array('test')))), $in, false, function($cx, $in) {return 'TRY~~~'.LR::encq($cx, $in).' , '.LR::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).' ~~~';}).'

. Test 7: '.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('people')), null, $in, true, function($cx, $in) {return ' 
 OK! 1 '.LR::hbch($cx, 'helper3', array(array(),array('val'=>LR::v($cx, $in, isset($in) ? $in : null, array('name')),'odd'=>LR::v($cx, $in, isset($in) ? $in : null, array('value')))), $in, false, function($cx, $in) {return 'TRY ?!??!!~~~'.LR::encq($cx, $in).' , '.LR::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).' ~~~';}).'
 OK! '.LR::hbch($cx, 'helper4', array(array(),array('val'=>LR::v($cx, $in, isset($in) ? $in : null, array('name')),'odd'=>LR::v($cx, $in, isset($in) ? $in : null, array('value')))), $in, false, function($cx, $in) {return 'TRY ?!~~~'.LR::encq($cx, $in).' , '.LR::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).' ~~~';}).'
';}).'';
}; ?>