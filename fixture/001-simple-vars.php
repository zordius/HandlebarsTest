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
        'helpers' => array(),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array('root' => $in),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('empty_var'))).'中文
Test \\on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
';
}
?>