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
    
    return ''.LCRun3::encq($cx, LCRun3::v($cx, $in, array('grand_parent_id'))).'
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('parent_contexts')), $in, false, function($cx, $in) {return '  '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('parent_id'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $in, array('grand_parent_id'))).')
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('child_contexts')), $in, false, function($cx, $in) {return '    '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('child_id'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $in, array('parent_id'))).' << '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('grand_parent_id'))).')
';}).'';}).'';
}
?>