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
include this:
    Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
This is next line.'.LCRun2::encq(Array('empty_var'), $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

end include.
section partial....
'.LCRun2::sec(Array('winners'), $cx, $in, false, function($cx, $in) {return '
  Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
This is next line.'.LCRun2::encq(Array('empty_var'), $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

';}).'
end section.

Winners: '.LCRun2::sec(Array('winners'), $cx, $in, false, function($cx, $in) {return ''.LCRun2::encq(Array(null), $cx, $in).'('.LCRun2::raw(Array(null), $cx, $in).') = '.LCRun2::encq(Array(null), $cx, $in).'('.LCRun2::raw(Array(null), $cx, $in).')';}).'

Partial1:Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
This is next line.'.LCRun2::encq(Array('empty_var'), $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

Partial2:Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
This is next line.'.LCRun2::encq(Array('empty_var'), $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

Partial3:Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
This is next line.'.LCRun2::encq(Array('empty_var'), $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

Partial4:Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
This is next line.'.LCRun2::encq(Array('empty_var'), $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

Partial5:Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
This is next line.'.LCRun2::encq(Array('empty_var'), $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

Partial6:Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
This is next line.'.LCRun2::encq(Array('empty_var'), $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

';
}
?>