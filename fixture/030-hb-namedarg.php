<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(            'helper1' => function($args, $named) {
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
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!

. Test 1: '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('url')),'this is a test & OK'),Array()), 'raw').' !!
. Test 2: '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('url')),'this is a test'),Array()), 'raw').' !!
. Test 3: '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('url')),'this is a test & OK'),Array()), 'encq').' !!
. Test 3: '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('url')),'string/arg.css'),Array()), 'encq').' !!
. Test 4: '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('url')),'this is a test'),Array()), 'encq').' !!
. Test 5: '.LCRun3::ch($cx, 'helper2', Array(Array(),Array('url'=>LCRun3::v($cx, $in, Array('url')),'text'=>'this is a test')), 'encq').' !!
. Test 6: '.LCRun3::ch($cx, 'helper2', Array(Array(),Array('ur"l'=>LCRun3::v($cx, $in, Array('url')),'text'=>'this is a test')), 'encq').' !!
. Test 7: '.LCRun3::ch($cx, 'helper2', Array(Array(),Array('url'=>'0','text'=>'10')), 'encq').' !!
. Test 8: '.LCRun3::ch($cx, 'helper2', Array(Array(),Array('url'=>'-1','text'=>'1.3')), 'encq').' !!
. Test 9: '.LCRun3::ch($cx, 'helper2', Array(Array(),Array('url'=>true,'text'=>false)), 'encq').' !!
';
}
?>