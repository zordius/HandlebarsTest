<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return '<ul>
'.LCRun2::sec((is_array($in) ? $in['people'] : null), $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq($cx['sp_vars']['index'], $cx).', '.LCRun2::encq($cx['sp_vars']['key'], $cx).' : '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' '.LCRun2::ifv((is_array($in) ? $in['name'] : null), $cx, $in, function($cx, $in) {return '(V)';}).''.LCRun2::ifv((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['test'] : null), $cx, $in, function($cx, $in) {return '(Y)';}).'</li>
';}).'
</ul>
';
}
?>