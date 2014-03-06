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
            'helper2' => function($hash) {
                $u = isset($hash['url']) ? $hash['url'] : 'undefined';
                $t = isset($hash['text']) ? $hash['text'] : 'undefined';
                $x = isset($hash['ur"l']) ? $hash['ur"l'] : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>({$x})";
            },
),
        'blockhelpers' => Array(            'helper3' => function($cx, $args) {
                return Array('test1', 'test2', 'test3');
            },
            'helper4' => function($cx, $args) {
                if (isset($args['val']) && is_array($cx)) {
                    $cx['helper4_value'] = $args['val'] % 2;
                    return $cx;
                }
                if (isset($args['odd'])) {
                    return Array(1,3,5,7,9);
                }
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