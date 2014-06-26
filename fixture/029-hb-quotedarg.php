<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(            'helper1' => function($args, $named) {
    $u = (isset($args[0])) ? $args[0] : 'undefined';
    $t = (isset($args[1])) ? $args[1] : 'undefined';
    return "<a href=\"{$u}\">{$t}</a>";
},
),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!

. Test 1: '.((LCRun3::ifvar($cx, '')) ? 'OK' : '').' !!
. Test 2: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('test','a b'))).' !!
. Test 3: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('te"st','cd'))).' !!
. Test 4: '.((LCRun3::ifvar($cx, LCRun3::v($cx, $in, Array('te"st')))) ? 'OK' : '').' !!
. Test 5: '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('url')),'this is a test & OK'),Array()), 'raw').' !!
. Test 6: '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('url')),'this is a test'),Array()), 'raw').' !!
. Test 7: '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('url')),'this is a test & OK'),Array()), 'encq').' !!
. Test 8: '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('url')),'this is a test'),Array()), 'encq').' !!
. Test 9: '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('url')),'this.is.atest'),Array()), 'encq').' !!
';
}
?>