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
    return 'Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
'.((!LCRun2::ifvar(Array('test'), $cx, $in)) ? '
Yes! '.LCRun2::encq(Array('name'), $cx, $in).' is '.LCRun2::encq(Array('gender'), $cx, $in).'
' : '').'
'.((!LCRun2::ifvar(Array('test'), $cx, $in)) ? '
2nd If, '.LCRun2::encq(Array('name'), $cx, $in).' is '.LCRun2::raw(Array('gender'), $cx, $in).'
' : '
Else test, '.LCRun2::encq(Array('name'), $cx, $in).' is '.LCRun2::encq(Array('gender'), $cx, $in).'
').'
'.LCRun2::encq(Array('end'), $cx, $in).'
';
}
?>