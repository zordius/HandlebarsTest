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
    return 'Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
'.((LCRun2::ifvar(Array('test'), $cx, $in)) ? '
Yes! '.LCRun2::encq(Array('name'), $cx, $in).' is '.LCRun2::encq(Array('gender'), $cx, $in).'
' : '').'
'.((LCRun2::ifvar(Array('test'), $cx, $in)) ? '
2nd If, '.LCRun2::encq(Array('name'), $cx, $in).' is '.LCRun2::raw(Array('gender'), $cx, $in).'
' : '
Else test, '.LCRun2::encq(Array('name'), $cx, $in).' is '.LCRun2::encq(Array('gender'), $cx, $in).'
').'
-TEST PATH-
'.((LCRun2::ifvar(Array('test','name'), $cx, $in)) ? '
Yes! '.LCRun2::encq(Array('subname'), $cx, $in).'
' : '
No! '.LCRun2::encq(Array('subname'), $cx, $in).'
').'
'.LCRun2::encq(Array('end'), $cx, $in).'
';
}
?>