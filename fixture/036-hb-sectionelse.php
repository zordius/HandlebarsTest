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

    );
    return '
Children for '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).':

'.LCRun3::sec($cx, ((is_array($in) && isset($in['child'])) ? $in['child'] : null), $in, false, function($cx, $in) {return '
    '.LCRun3::ifv($cx, ((is_array($in) && isset($in['key'])) ? $in['key'] : null), $in, function($cx, $in) {return '
       The value is = '.LCRun3::encq($cx, ((is_array($in) && isset($in['key'])) ? $in['key'] : null)).' !!
    ';}, function($cx, $in) {return '
        key is empty or null
    ';}).'
';}, function($cx, $in) {return '
  '.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null)).' has no children.
';}).'
';
}
?>