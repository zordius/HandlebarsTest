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
<ul>
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return ' <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('gender'))).'</li>
';}).'</ul>
- '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('end'))).' -
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return ' THIS:'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is a '.LCRun3::raw($cx, LCRun3::v($cx, $in, array('gender'))).'
';}).'==
';
}
?>