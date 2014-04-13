<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return '
Children for '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).':

'.LCRun2::sec((is_array($in) ? $in['child'] : null), $cx, $in, true, function($cx, $in) {return '
    '.LCRun2::ifv((is_array($in) ? $in['key'] : null), $cx, $in, function($cx, $in) {return '
       The value is = '.LCRun2::encq((is_array($in) ? $in['key'] : null), $cx).' !!
    ';}, function($cx, $in) {return '
        key is empty or null
    ';}).'
';}, function($cx, $in) {return '
  '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).' has no children.
';}).'
';
}
?>