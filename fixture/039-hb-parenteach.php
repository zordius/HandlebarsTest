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
    
    return 'A
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return '=> '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('key'))).' , '.LCRun3::encq($cx, $in).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('index'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('first'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('last'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent'], array('index'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent'], array('key'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent'], array('first'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent'], array('last'))).' # '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent']['_parent'], array('index'))).' - '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent']['_parent'], array('key'))).' .
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return ' =>> '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('key'))).' , '.LCRun3::encq($cx, $in).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('index'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('first'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('last'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent'], array('index'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent'], array('key'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent'], array('first'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent'], array('last'))).' # '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent']['_parent'], array('index'))).' - '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent']['_parent'], array('key'))).' .
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return '  =>>> '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('key'))).' , '.LCRun3::encq($cx, $in).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('index'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('first'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('last'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent'], array('index'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent'], array('key'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent'], array('first'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent'], array('last'))).' # '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent']['_parent'], array('index'))).' - '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars']['_parent']['_parent'], array('key'))).' .
';}).'';}).'';}).'';
}
?>