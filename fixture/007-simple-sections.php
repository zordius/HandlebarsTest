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
    return '<h1>'.LCRun2::encq((is_array($in) ? $in['header'] : null), $cx).'</h1>
'.LCRun2::sec((is_array($in) ? $in['notEmpty'] : null), $cx, $in, false, function($cx, $in) {return '
<ul>
'.LCRun2::sec((is_array($in) ? $in['item'] : null), $cx, $in, false, function($cx, $in) {return '
'.LCRun2::sec((is_array($in) ? $in['current'] : null), $cx, $in, false, function($cx, $in) {return '
    <li><strong>'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).'</strong></li>
';}).'
'.((LCRun2::isec((is_array($in) ? $in['current'] : null))) ? '
    <li><a href="'.LCRun2::encq((is_array($in) ? $in['url'] : null), $cx).'">'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).'</a></li>
' : '').'
';}).'
</ul>
';}).'
'.LCRun2::sec((is_array($in) ? $in['isEmpty'] : null), $cx, $in, false, function($cx, $in) {return '
<p>The list is empty.</p>
';}).'
';
}
?>