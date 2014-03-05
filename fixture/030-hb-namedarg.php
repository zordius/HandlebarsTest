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
            'helper2' => function($hash) {
                $u = isset($hash['url']) ? $hash['url'] : 'undefined';
                $t = isset($hash['text']) ? $hash['text'] : 'undefined';
                $x = isset($hash['ur"l']) ? $hash['ur"l'] : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>({$x})";
            },
),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

. Test 1: '.LCRun2::ch('helper1', Array(Array('url'),Array('"this is a test & OK"')), 'raw', $cx, $in).' !!
. Test 2: '.LCRun2::ch('helper1', Array(Array('url'),Array('"this is a test"')), 'raw', $cx, $in).' !!
. Test 3: '.LCRun2::ch('helper1', Array(Array('url'),Array('"this is a test & OK"')), 'encq', $cx, $in).' !!
. Test 4: '.LCRun2::ch('helper1', Array(Array('url'),Array('"this is a test"')), 'encq', $cx, $in).' !!
. Test 5: '.LCRun2::ch('helper2', Array('url'=>Array('url'),'text'=>Array('"this is a test"')), 'encq', $cx, $in, true).' !!
. Test 6: '.LCRun2::ch('helper2', Array('ur"l'=>Array('url'),'text'=>Array('"this is a test"')), 'encq', $cx, $in, true).' !!
';
}
?>