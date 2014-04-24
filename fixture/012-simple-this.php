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
    return 'Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
Winners: '.LCRun2::sec(((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $cx, $in, false, function($cx, $in) {return ''.LCRun2::encq($in, $cx).'('.LCRun2::raw($in, $cx).') = '.LCRun2::encq($in, $cx).'('.LCRun2::raw($in, $cx).')';}).'
';
}
?>