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
    
    return '<ul>
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('people')), $in, true, function($cx, $in) {return ' <li>'.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('index'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('key'))).' : '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' [from '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('first'))).' to '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('last'))).']</li>
';}).'</ul>
';
}
?>