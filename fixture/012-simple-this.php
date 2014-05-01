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
    return 'Hello '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', you have just won $'.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).'!
Winners: '.LCRun3::sec($cx, ((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $in, false, function($cx, $in) {return ''.LCRun3::encq($cx, $in).'('.LCRun3::raw($cx, $in).') = '.LCRun3::encq($cx, $in).'('.LCRun3::raw($cx, $in).')';}).'
';
}
?>