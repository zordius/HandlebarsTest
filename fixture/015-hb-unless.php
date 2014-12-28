<?php return function ($in, $debugopt = 1) {
    $cx = array(
        'flags' => array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'mustsec' => false,
            'echo' => false,
            'debug' => $debugopt,
        ),
        'constants' => array(),
        'helpers' => array(),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array('root' => $in),

    );
    
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
'.((!LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('test')))) ? 'Yes! '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('gender'))).'
' : '').''.((!LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('test')))) ? '2nd If, '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is '.LCRun3::raw($cx, LCRun3::v($cx, $in, array('gender'))).'
' : 'Else test, '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('gender'))).'
').''.LCRun3::encq($cx, LCRun3::v($cx, $in, array('end'))).'
';
}
?>