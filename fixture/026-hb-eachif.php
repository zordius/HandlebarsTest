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
    return ''.LCRun3::ifv($cx, LCRun3::v($cx, $in, Array('empty')), $in, function($cx, $in) {return '

';}, function($cx, $in) {return '
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('data')), $in, true, function($cx, $in) {return '

'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('child')), $in, true, function($cx, $in) {return '
    '.LCRun3::ifv($cx, LCRun3::v($cx, $in, Array('key')), $in, function($cx, $in) {return '
       The value is = '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('key'))).' !!
    ';}, function($cx, $in) {return '
        key is empty or null
    ';}).'

    '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('fake'))).'

';}).'
';}).'

';}).'
';
}
?>