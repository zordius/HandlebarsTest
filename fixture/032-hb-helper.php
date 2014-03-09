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
        'blockhelpers' => Array(),
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