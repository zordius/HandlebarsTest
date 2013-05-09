<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.LightnCandy::enc('name', $cx, $in).', you have just won $'.LightnCandy::enc('value', $cx, $in).'!
This is next line.
'.LightnCandy::sec('test', $cx, $in, false, function($cx, $in) {return '
This is true! won $'.LightnCandy::enc('value', $cx, $in).'!!
';}).'
';
}
?>