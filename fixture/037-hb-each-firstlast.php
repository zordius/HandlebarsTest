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
 <li>'.LCRun2::encq($cx['sp_vars']['index'], $cx).', '.LCRun2::encq($cx['sp_vars']['key'], $cx).' : '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' [from '.LCRun2::encq($cx['sp_vars']['first'], $cx).' to '.LCRun2::encq($cx['sp_vars']['last'], $cx).']</li>
';}).'
</ul>
';
}
?>