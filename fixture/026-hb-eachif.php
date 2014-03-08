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
    return ''.LCRun2::ifv((is_array($in) ? $in['empty'] : null), $cx, $in, function($cx, $in) {return '

';}, function($cx, $in) {return '
'.LCRun2::sec((is_array($in) ? $in['data'] : null), $cx, $in, true, function($cx, $in) {return '

'.LCRun2::sec((is_array($in) ? $in['child'] : null), $cx, $in, true, function($cx, $in) {return '
    '.LCRun2::ifv((is_array($in) ? $in['key'] : null), $cx, $in, function($cx, $in) {return '
       The value is = '.LCRun2::encq((is_array($in) ? $in['key'] : null), $cx).' !!
    ';}, function($cx, $in) {return '
        key is empty or null
    ';}).'

    '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['fake'] : null), $cx).'

';}).'
';}).'

';}).'
';
}
?>