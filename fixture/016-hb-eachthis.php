<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'partials' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
<ul>
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return '
 <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('gender'))).'</li>
';}).'
</ul>
- '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('end'))).' -
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return '
 THIS:'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is a '.LCRun3::raw($cx, LCRun3::v($cx, $in, Array('gender'))).'
';}).'
==
';
}
?>