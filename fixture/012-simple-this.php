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
Winners: '.LCRun3::sec($cx, LCRun3::v($cx, $in, array('winners')), $in, false, function($cx, $in) {return ''.LCRun3::encq($cx, $in).'('.LCRun3::raw($cx, $in).') = '.LCRun3::encq($cx, $in).'('.LCRun3::raw($cx, $in).')';}).'
';
}
?>