<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return '<ul>
'.LCRun2::sec(((is_array($in) && isset($in['people'])) ? $in['people'] : null), $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq($cx['sp_vars']['index'], $cx).', '.LCRun2::encq($cx['sp_vars']['key'], $cx).' : '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' '.LCRun2::ifv(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx, $in, function($cx, $in) {return '(V)';}).''.LCRun2::ifv(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['test'])) ? $cx['scopes'][count($cx['scopes'])-1]['test'] : null), $cx, $in, function($cx, $in) {return '(Y)';}).'</li>
';}).'
</ul>
';
}
?>