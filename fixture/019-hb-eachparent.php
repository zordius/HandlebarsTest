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
<ul>
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return ' <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('end'))).')</li>
';}).'</ul>
'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('end'))).'
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return ' THIS:'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is a '.LCRun3::raw($cx, LCRun3::v($cx, $in, array('gender'))).'
 PARENT: '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).', '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('value'))).', '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('end'))).' END '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('end'))).' NAME '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).'
';}).'Section This:
'.LCRun3::sec($cx, $in, $in, false, function($cx, $in) {return ' <li>X~'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('end'))).')</li>
';}).'Section Var:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('people')), $in, false, function($cx, $in) {return ' <li>XXXVAR'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('end'))).')</li>
';}).'Each Var:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('people')), $in, true, function($cx, $in) {return ' <li>XXX-EACH-VAR'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('end'))).')</li>
';}).'';
}
?>