<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
Winners: '.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('winners')), $in, false, function($cx, $in) {return ''.LCRun3::encq($cx, $in).'('.LCRun3::raw($cx, $in).') = '.LCRun3::encq($cx, $in).'('.LCRun3::raw($cx, $in).')';}).'
';
}
?>