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
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return '<ul>
'.LCRun3::sec($cx, ((is_array($in) && isset($in['people'])) ? $in['people'] : null), $in, true, function($cx, $in) {return '
 <li>'.LCRun3::encq($cx, $cx['sp_vars']['index']).', '.LCRun3::encq($cx, $cx['sp_vars']['key']).' : '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).' '.LCRun3::ifv($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null), $in, function($cx, $in) {return '(V)';}).''.LCRun3::ifv($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['test'])) ? $cx['scopes'][count($cx['scopes'])-1]['test'] : null), $in, function($cx, $in) {return '(Y)';}).'</li>
';}).'
</ul>
';
}
?>