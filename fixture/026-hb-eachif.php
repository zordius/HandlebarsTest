<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(            'helper1' => function($url, $txt) {
                $u = ($url !== null) ? $url : 'undefined';
                $t = ($txt !== null) ? $txt : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>";
            },
),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return ''.LCRun::ifv('empty', $cx, $in, function($cx, $in) {return '

';}, function($cx, $in) {return '
'.LCRun::sec('data', $cx, $in, true, function($cx, $in) {return '

'.LCRun::sec('child', $cx, $in, true, function($cx, $in) {return '
    '.LCRun::ifv('key', $cx, $in, function($cx, $in) {return '
       The value is = '.LCRun::encq('key', $cx, $in).' !!
    ';}, function($cx, $in) {return '
        key is empty or null
    ';}).'

    '.LCRun::encq('../fake', $cx, $in).'

';}).'
';}).'

';}).'
';
}
?>