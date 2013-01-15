<?php return function ($in) {
    $cx = Array(
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.LightnCandy::enc('name', $cx, $in).', you have just won $'.LightnCandy::enc('value', $cx, $in).'!
'.LightnCandy::sec('test', $cx, $in, false, function($cx, $in) {return ''.'
This is true! won $'.LightnCandy::enc('value', $cx, $in).'!!
';}).'
';
}
?>