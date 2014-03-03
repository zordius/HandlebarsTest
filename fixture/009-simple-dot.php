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
    return 'Hello '.LCRun2::encq(Array('winner','name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('winner','value'), $cx, $in).'!
We have $'.LCRun2::encq(Array('award','first','value'), $cx, $in).' for '.LCRun2::encq(Array('award','first','name'), $cx, $in).' award!!
Raw dot test: '.LCRun2::encq(Array('winner','name'), $cx, $in).' '.LCRun2::raw(Array('award','first','value'), $cx, $in).' for '.LCRun2::raw(Array('award','first','name'), $cx, $in).'
';
}
?>