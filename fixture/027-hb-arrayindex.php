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
    return 'Hello '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'!

##0 start section:
'.LCRun2::sec((is_array($in) ? $in['winners'] : null), $cx, $in, false, function($cx, $in) {return '
  - EACH 1- '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).'
';}).'
end section.

##1 start each:
'.LCRun2::sec((is_array($in) ? $in['winners'] : null), $cx, $in, true, function($cx, $in) {return '
  - EACH 2 - '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).'
';}).'
end each.

##3 Index
Index ?: '.LCRun2::encq((is_array($in['winners']) ? $in['winners']['name'] : null), $cx).'
Index 0: '.LCRun2::encq((is_array($in['winners']['0']) ? $in['winners']['0']['name'] : null), $cx).'
Index 1: '.LCRun2::encq((is_array($in['winners']['1']) ? $in['winners']['1']['name'] : null), $cx).'
';
}
?>