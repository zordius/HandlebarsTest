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
'.LCRun3::sec($cx, ((is_array($in) && isset($in['people'])) ? $in['people'] : null), $in, true, function($cx, $in) {return '
 <li>'.LCRun3::encq($cx, $cx['sp_vars']['index']).', '.LCRun3::encq($cx, $cx['sp_vars']['key']).' : '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).' [from '.LCRun3::encq($cx, $cx['sp_vars']['first']).' to '.LCRun3::encq($cx, $cx['sp_vars']['last']).']</li>
';}).'
</ul>
';
}
?>