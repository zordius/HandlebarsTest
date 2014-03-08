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
'.((LCRun2::ifvar((is_array($in) ? $in['test'] : null))) ? '
Yes! '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' is '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).'
' : '').'
'.((LCRun2::ifvar((is_array($in) ? $in['test'] : null))) ? '
2nd If, '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' is '.LCRun2::raw((is_array($in) ? $in['gender'] : null), $cx).'
' : '
Else test, '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' is '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).'
').'
-TEST PATH-
'.((LCRun2::ifvar((is_array($in['test']) ? $in['test']['name'] : null))) ? '
Yes! '.LCRun2::encq((is_array($in) ? $in['subname'] : null), $cx).'
' : '
No! '.LCRun2::encq((is_array($in) ? $in['subname'] : null), $cx).'
').'
'.LCRun2::encq((is_array($in) ? $in['end'] : null), $cx).'
';
}
?>