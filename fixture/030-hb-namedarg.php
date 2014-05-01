<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
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
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', you have just won $'.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).'!

. Test 1: '.LCRun3::ch($cx, 'helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test & OK'), 'raw').' !!
. Test 2: '.LCRun3::ch($cx, 'helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test'), 'raw').' !!
. Test 3: '.LCRun3::ch($cx, 'helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test & OK'), 'encq').' !!
. Test 3: '.LCRun3::ch($cx, 'helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'string/arg.css'), 'encq').' !!
. Test 4: '.LCRun3::ch($cx, 'helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test'), 'encq').' !!
. Test 5: '.LCRun3::ch($cx, 'helper2', Array('url'=>((is_array($in) && isset($in['url'])) ? $in['url'] : null),'text'=>'this is a test'), 'encq', true).' !!
. Test 6: '.LCRun3::ch($cx, 'helper2', Array('ur"l'=>((is_array($in) && isset($in['url'])) ? $in['url'] : null),'text'=>'this is a test'), 'encq', true).' !!
. Test 7: '.LCRun3::ch($cx, 'helper2', Array('url'=>'0','text'=>'10'), 'encq', true).' !!
. Test 8: '.LCRun3::ch($cx, 'helper2', Array('url'=>'-1','text'=>'1.3'), 'encq', true).' !!
';
}
?>