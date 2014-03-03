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
    return '<ul>
'.LCRun2::sec(Array('people'), $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq(Array('@index'), $cx, $in).', '.LCRun2::encq(Array('@key'), $cx, $in).' : '.LCRun2::encq(Array('name'), $cx, $in).' '.((LCRun2::ifvar(Array('name'), $cx, $in)) ? '(V)' : '').''.((LCRun2::ifvar(Array(1,'test'), $cx, $in)) ? '(Y)' : '').'</li>
';}).'
</ul>
';
}
?>