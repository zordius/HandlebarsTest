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

. Test 1: '.LCRun2::ch('helper1', Array(Array('url'),Array('text')), 'raw', $cx, $in).'
. Test 2: '.LCRun2::ch('helper1', Array(Array('url'),Array('text')), 'encq', $cx, $in).'
. Test 3: '.LCRun2::ch('helper1', Array(Array('people','url'),Array('people','text')), 'encq', $cx, $in).'
. Test 4: '.LCRun2::sec(Array('people'), $cx, $in, true, function($cx, $in) {return '
  * '.LCRun2::ch('helper1', Array(Array(1,'url'),Array(1,'text')), 'encq', $cx, $in).' !
';}).'
';
}
?>