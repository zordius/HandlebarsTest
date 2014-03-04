<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(            'helper1' => function($url, $txt) {
                $u = ($url !== null) ? $url : 'undefined';
                $t = ($txt !== null) ? $txt : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>";
            },
),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

. Test 1: '.((LCRun2::ifvar(Array('""'), $cx, $in)) ? 'OK' : '').' !!
. Test 2: '.LCRun2::encq(Array('test','a b'), $cx, $in).' !!
. Test 3: '.LCRun2::encq(Array('te"st','cd'), $cx, $in).' !!
. Test 4: '.((LCRun2::ifvar(Array('te"st'), $cx, $in)) ? 'OK' : '').' !!
. Test 5: '.LCRun2::ch('helper1', Array(Array('url'),Array('"this is a test & OK"')), 'raw', $cx, $in).' !!
. Test 6: '.LCRun2::ch('helper1', Array(Array('url'),Array('"this is a test"')), 'raw', $cx, $in).' !!
. Test 7: '.LCRun2::ch('helper1', Array(Array('url'),Array('"this is a test & OK"')), 'encq', $cx, $in).' !!
. Test 8: '.LCRun2::ch('helper1', Array(Array('url'),Array('"this is a test"')), 'encq', $cx, $in).' !!
';
}
?>