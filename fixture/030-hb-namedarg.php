<?php return function ($in, $debugopt = 1) {
    $cx = array(
        'flags' => array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'mustsec' => false,
            'echo' => false,
            'debug' => $debugopt,
        ),
        'constants' => array(),
        'helpers' => array(            'helper1' => function($args, $named) {
    $u = (isset($args[0])) ? $args[0] : 'undefined';
    $t = (isset($args[1])) ? $args[1] : 'undefined';
    return "<a href=\"{$u}\">{$t}</a>";
},
            'helper2' => function($args, $named) {
    $u = isset($named['url']) ? jsraw($named['url']) : 'undefined';
    $t = isset($named['text']) ? jsraw($named['text']) : 'undefined';
    $x = isset($named['ur"l']) ? $named['ur"l'] : 'undefined';
    return "<a href=\"{$u}\">{$t}</a>({$x})";
},
),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array('root' => $in),

    );
    
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!

. Test 1: '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),'this is a test & OK'),array()), 'raw').' !!
. Test 2: '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),'this is a test'),array()), 'raw').' !!
. Test 3: '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),'this is a test & OK'),array()), 'encq').' !!
. Test 3: '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),'string/arg.css'),array()), 'encq').' !!
. Test 4: '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),'this is a test'),array()), 'encq').' !!
. Test 5: '.LCRun3::ch($cx, 'helper2', array(array(),array('url'=>LCRun3::v($cx, $in, array('url')),'text'=>'this is a test')), 'encq').' !!
. Test 6: '.LCRun3::ch($cx, 'helper2', array(array(),array('ur"l'=>LCRun3::v($cx, $in, array('url')),'text'=>'this is a test')), 'encq').' !!
. Test 7: '.LCRun3::ch($cx, 'helper2', array(array(),array('url'=>'0','text'=>'10')), 'encq').' !!
. Test 8: '.LCRun3::ch($cx, 'helper2', array(array(),array('url'=>'-1','text'=>'1.3')), 'encq').' !!
. Test 9: '.LCRun3::ch($cx, 'helper2', array(array(),array('url'=>true,'text'=>false)), 'encq').' !!
';
}
?>