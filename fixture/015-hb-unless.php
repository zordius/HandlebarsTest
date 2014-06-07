<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
'.((!LCRun3::ifvar($cx, LCRun3::v($cx, $in, Array('test')))) ? '
Yes! '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('gender'))).'
' : '').'
'.((!LCRun3::ifvar($cx, LCRun3::v($cx, $in, Array('test')))) ? '
2nd If, '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is '.LCRun3::raw($cx, LCRun3::v($cx, $in, Array('gender'))).'
' : '
Else test, '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('gender'))).'
').'
'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('end'))).'
';
}
?>