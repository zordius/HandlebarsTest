<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return '
Children for '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).':

'.LCRun2::sec(((is_array($in) && isset($in['child'])) ? $in['child'] : null), $cx, $in, false, function($cx, $in) {return '
    '.LCRun2::ifv(((is_array($in) && isset($in['key'])) ? $in['key'] : null), $cx, $in, function($cx, $in) {return '
       The value is = '.LCRun2::encq(((is_array($in) && isset($in['key'])) ? $in['key'] : null), $cx).' !!
    ';}, function($cx, $in) {return '
        key is empty or null
    ';}).'
';}, function($cx, $in) {return '
  '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).' has no children.
';}).'
';
}
?>