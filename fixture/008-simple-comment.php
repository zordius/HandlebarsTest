<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
'.LCRun::sec('test', $cx, $in, false, function($cx, $in) {return ''.'
This is true! won $'.LCRun::encq('value', $cx, $in).'!!
';}).'
';
}
?>