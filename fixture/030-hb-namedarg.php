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
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!

. Test 1: '.LCRun2::ch('helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test & OK'), 'raw', $cx).' !!
. Test 2: '.LCRun2::ch('helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test'), 'raw', $cx).' !!
. Test 3: '.LCRun2::ch('helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test & OK'), 'encq', $cx).' !!
. Test 3: '.LCRun2::ch('helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'string/arg.css'), 'encq', $cx).' !!
. Test 4: '.LCRun2::ch('helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test'), 'encq', $cx).' !!
. Test 5: '.LCRun2::ch('helper2', Array('url'=>((is_array($in) && isset($in['url'])) ? $in['url'] : null),'text'=>'this is a test'), 'encq', $cx, true).' !!
. Test 6: '.LCRun2::ch('helper2', Array('ur"l'=>((is_array($in) && isset($in['url'])) ? $in['url'] : null),'text'=>'this is a test'), 'encq', $cx, true).' !!
. Test 7: '.LCRun2::ch('helper2', Array('url'=>'0','text'=>'10'), 'encq', $cx, true).' !!
. Test 8: '.LCRun2::ch('helper2', Array('url'=>'-1','text'=>'1.3'), 'encq', $cx, true).' !!
';
}
?>