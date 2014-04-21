<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return ''.LCRun2::ifv(((is_array($in) && isset($in['empty'])) ? $in['empty'] : null), $cx, $in, function($cx, $in) {return '

';}, function($cx, $in) {return '
'.LCRun2::sec(((is_array($in) && isset($in['data'])) ? $in['data'] : null), $cx, $in, true, function($cx, $in) {return '

'.LCRun2::sec(((is_array($in) && isset($in['child'])) ? $in['child'] : null), $cx, $in, true, function($cx, $in) {return '
    '.LCRun2::ifv(((is_array($in) && isset($in['key'])) ? $in['key'] : null), $cx, $in, function($cx, $in) {return '
       The value is = '.LCRun2::encq(((is_array($in) && isset($in['key'])) ? $in['key'] : null), $cx).' !!
    ';}, function($cx, $in) {return '
        key is empty or null
    ';}).'

    '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['fake'])) ? $cx['scopes'][count($cx['scopes'])-1]['fake'] : null), $cx).'

';}).'
';}).'

';}).'
';
}
?>