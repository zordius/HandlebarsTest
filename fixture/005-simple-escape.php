<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'mustsec' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'partials' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
Hello original '.LCRun3::raw($cx, LCRun3::v($cx, $in, Array('name'))).' , the value is '.LCRun3::raw($cx, LCRun3::v($cx, $in, Array('value'))).'
Hello mustache '.LCRun3::raw($cx, LCRun3::v($cx, $in, Array('name'))).' , the value is '.LCRun3::raw($cx, LCRun3::v($cx, $in, Array('value'))).'
';
}
?>