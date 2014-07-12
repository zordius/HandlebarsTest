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
        'partials' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('winner','name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('winner','value'))).'!
We have $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('award','first','value'))).' for '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('award','first','name'))).' award!!
Raw dot test: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('winner','name'))).' '.LCRun3::raw($cx, LCRun3::v($cx, $in, Array('award','first','value'))).' for '.LCRun3::raw($cx, LCRun3::v($cx, $in, Array('award','first','name'))).'
';
}
?>