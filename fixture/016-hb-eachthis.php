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
    return 'Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
<ul>
'.LCRun2::sec(Array(null), $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq(Array('name'), $cx, $in).' is a '.LCRun2::encq(Array('gender'), $cx, $in).'</li>
';}).'
</ul>
- '.LCRun2::encq(Array('end'), $cx, $in).' -
'.LCRun2::sec(Array(null), $cx, $in, true, function($cx, $in) {return '
 THIS:'.LCRun2::encq(Array('name'), $cx, $in).' is a '.LCRun2::raw(Array('gender'), $cx, $in).'
';}).'
==
';
}
?>