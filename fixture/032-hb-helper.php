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
),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', you have just won $'.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).'!

. Test 1: '.LCRun3::ch($cx, 'helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),((is_array($in) && isset($in['text'])) ? $in['text'] : null)), 'raw').'
. Test 2: '.LCRun3::ch($cx, 'helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),((is_array($in) && isset($in['text'])) ? $in['text'] : null)), 'encq').'
. Test 3: '.LCRun3::ch($cx, 'helper1', Array(((is_array($in['test']) && isset($in['test']['url'])) ? $in['test']['url'] : null),((is_array($in['test']) && isset($in['test']['text'])) ? $in['test']['text'] : null)), 'encq').'
. Test 4: '.LCRun3::sec($cx, ((is_array($in) && isset($in['people'])) ? $in['people'] : null), $in, true, function($cx, $in) {return '
  * '.LCRun3::ch($cx, 'helper1', Array(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['url'])) ? $cx['scopes'][count($cx['scopes'])-1]['url'] : null),((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['text'])) ? $cx['scopes'][count($cx['scopes'])-1]['text'] : null)), 'encq').' <= '.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['url'])) ? $cx['scopes'][count($cx['scopes'])-1]['url'] : null)).' , '.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['text'])) ? $cx['scopes'][count($cx['scopes'])-1]['text'] : null)).', '.LCRun3::raw($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['url'])) ? $cx['scopes'][count($cx['scopes'])-1]['url'] : null)).', '.LCRun3::raw($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['text'])) ? $cx['scopes'][count($cx['scopes'])-1]['text'] : null)).' !!
  * '.LCRun3::ch($cx, 'helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),((is_array($in) && isset($in['text'])) ? $in['text'] : null)), 'encq').' <= '.LCRun3::encq($cx, ((is_array($in) && isset($in['url'])) ? $in['url'] : null)).' , '.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['text'])) ? $cx['scopes'][count($cx['scopes'])-1]['text'] : null)).' , '.LCRun3::raw($cx, ((is_array($in) && isset($in['url'])) ? $in['url'] : null)).', '.LCRun3::raw($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['text'])) ? $cx['scopes'][count($cx['scopes'])-1]['text'] : null)).' :D
';}).'
';
}
?>