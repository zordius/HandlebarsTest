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
    return '<h1>'.LCRun2::encq(Array('header'), $cx, $in).'</h1>
'.LCRun2::sec(Array('notEmpty'), $cx, $in, false, function($cx, $in) {return '
<ul>
'.LCRun2::sec(Array('item'), $cx, $in, false, function($cx, $in) {return '
'.LCRun2::sec(Array('current'), $cx, $in, false, function($cx, $in) {return '
    <li><strong>'.LCRun2::encq(Array('name'), $cx, $in).'</strong></li>
';}).'
'.((LCRun2::isec(Array('current'), $cx, $in)) ? '
    <li><a href="'.LCRun2::encq(Array('url'), $cx, $in).'">'.LCRun2::encq(Array('name'), $cx, $in).'</a></li>
' : '').'
';}).'
</ul>
';}).'
'.LCRun2::sec(Array('isEmpty'), $cx, $in, false, function($cx, $in) {return '
<p>The list is empty.</p>
';}).'
';
}
?>