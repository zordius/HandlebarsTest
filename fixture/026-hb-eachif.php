<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return ''.LCRun::ifv('empty', $cx, $in, function($cx, $in) {return '

';}, function($cx, $in) {return '
'.LCRun::sec('data', $cx, $in, true, function($cx, $in) {return '

'.LCRun::sec('child', $cx, $in, true, function($cx, $in) {return '
    '.LCRun::ifv('key', $cx, $in, function($cx, $in) {return '
       The value is = '.LCRun::enc('key', $cx, $in).' !!
    ';}, function($cx, $in) {return '
        key is empty or null
    ';}).'

    '.LCRun::enc('../fake', $cx, $in).'

';}).'
';}).'

';}).'
';
}
?>