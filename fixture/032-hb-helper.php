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
        'blockhelpers' => Array(            'helper3' => function($cx, $args) {
                return Array('test1', 'test2', 'test3');
            },
            'helper4' => function($cx, $args) {
                if (isset($args['val']) && is_array($cx)) {
                    $cx['helper4_value'] = $args['val'] % 2;
                    return $cx;
                }
                if (isset($args['odd'])) {
                    return Array(1,3,5,7,9);
                }
            },
),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'!

. Test 1: '.LCRun2::ch('helper1', Array((is_array($in) ? $in['url'] : null),(is_array($in) ? $in['text'] : null)), 'raw', $cx).'
. Test 2: '.LCRun2::ch('helper1', Array((is_array($in) ? $in['url'] : null),(is_array($in) ? $in['text'] : null)), 'encq', $cx).'
. Test 3: '.LCRun2::ch('helper1', Array((is_array($in['test']) ? $in['test']['url'] : null),(is_array($in['test']) ? $in['test']['text'] : null)), 'encq', $cx).'
. Test 4: '.LCRun2::sec((is_array($in) ? $in['people'] : null), $cx, $in, true, function($cx, $in) {return '
  * '.LCRun2::ch('helper1', Array((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['url'] : null),(is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['text'] : null)), 'encq', $cx).' <= '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['url'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['text'] : null), $cx).', '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['url'] : null), $cx).', '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['text'] : null), $cx).' !!
  * '.LCRun2::ch('helper1', Array((is_array($in) ? $in['url'] : null),(is_array($in) ? $in['text'] : null)), 'encq', $cx).' <= '.LCRun2::encq((is_array($in) ? $in['url'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['text'] : null), $cx).' , '.LCRun2::raw((is_array($in) ? $in['url'] : null), $cx).', '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['text'] : null), $cx).' :D
';}).'
';
}
?>