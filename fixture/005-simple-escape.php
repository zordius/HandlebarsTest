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
            'debug' => $debugopt,
        ),
        'helpers' => array(),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
Hello original '.LCRun3::raw($cx, LCRun3::v($cx, $in, array('name'))).' , the value is '.LCRun3::raw($cx, LCRun3::v($cx, $in, array('value'))).'
Hello mustache '.LCRun3::raw($cx, LCRun3::v($cx, $in, array('name'))).' , the value is '.LCRun3::raw($cx, LCRun3::v($cx, $in, array('value'))).'
';
}
?>