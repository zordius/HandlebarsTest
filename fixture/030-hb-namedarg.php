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
        'helpers' => Array(            'helper1' => function($url, $txt) {
                $u = ($url !== null) ? $url : 'undefined';
                $t = ($txt !== null) ? $txt : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>";
            },
            'helper2' => function($hash) {
                $u = isset($hash['url']) ? $hash['url'] : 'undefined';
                $t = isset($hash['text']) ? $hash['text'] : 'undefined';
                $x = isset($hash['ur"l']) ? $hash['ur"l'] : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>({$x})";
            },
),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!

. Test 1: '.LCRun3::ch($cx, 'helper1', Array(LCRun3::v($cx, $in, Array('url')),'this is a test & OK'), 'raw').' !!
. Test 2: '.LCRun3::ch($cx, 'helper1', Array(LCRun3::v($cx, $in, Array('url')),'this is a test'), 'raw').' !!
. Test 3: '.LCRun3::ch($cx, 'helper1', Array(LCRun3::v($cx, $in, Array('url')),'this is a test & OK'), 'encq').' !!
. Test 3: '.LCRun3::ch($cx, 'helper1', Array(LCRun3::v($cx, $in, Array('url')),'string/arg.css'), 'encq').' !!
. Test 4: '.LCRun3::ch($cx, 'helper1', Array(LCRun3::v($cx, $in, Array('url')),'this is a test'), 'encq').' !!
. Test 5: '.LCRun3::ch($cx, 'helper2', Array('url'=>LCRun3::v($cx, $in, Array('url')),'text'=>'this is a test'), 'encq', true).' !!
. Test 6: '.LCRun3::ch($cx, 'helper2', Array('ur"l'=>LCRun3::v($cx, $in, Array('url')),'text'=>'this is a test'), 'encq', true).' !!
. Test 7: '.LCRun3::ch($cx, 'helper2', Array('url'=>'0','text'=>'10'), 'encq', true).' !!
. Test 8: '.LCRun3::ch($cx, 'helper2', Array('url'=>'-1','text'=>'1.3'), 'encq', true).' !!
';
}
?>