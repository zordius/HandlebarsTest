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

##0 start section:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('winners')), $in, false, function($cx, $in) {return '  - EACH 1- '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).'
';}).'end section.

##1 start each:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('winners')), $in, true, function($cx, $in) {return '  - EACH 2 - '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).'
';}).'end each.

##3 Index
Index ?: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('winners','name'))).'
Index 0: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('winners','0','name'))).'
Index 1: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('winners','1','name'))).'
';
}
?>