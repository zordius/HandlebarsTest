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
    return 'Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
This is next line.'.LCRun::encq('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
';
}
?>