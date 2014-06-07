<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
<ul>
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return '
 <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('end'))).')</li>
';}).'
</ul>
'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('end'))).'
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return '
 THIS:'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is a '.LCRun3::raw($cx, LCRun3::v($cx, $in, Array('gender'))).'
 PARENT: '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).', '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('value'))).', '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('end'))).' END '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('end'))).' NAME '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).'
';}).'
Section This:
'.LCRun3::sec($cx, $in, $in, false, function($cx, $in) {return '
 <li>X~'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('end'))).')</li>
';}).'
Section Var:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('people')), $in, false, function($cx, $in) {return '
 <li>XXXVAR'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('end'))).')</li>
';}).'
Each Var:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('people')), $in, true, function($cx, $in) {return '
 <li>XXX-EACH-VAR'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('end'))).')</li>
';}).'
';
}
?>