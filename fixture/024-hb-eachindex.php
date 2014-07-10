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
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return '<ul>
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('people')), $in, true, function($cx, $in) {return '
 <li>'.LCRun3::encq($cx, $cx['sp_vars']['index']).', '.LCRun3::encq($cx, $cx['sp_vars']['key']).' : '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' '.LCRun3::ifv($cx, LCRun3::v($cx, $in, Array('name')), $in, function($cx, $in) {return '(V)';}).''.LCRun3::ifv($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('test')), $in, function($cx, $in) {return '(Y)';}).'</li>
';}).'
</ul>
';
}
?>