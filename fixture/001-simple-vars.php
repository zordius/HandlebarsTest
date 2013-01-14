<?php return function ($in) {
    $cx = Array(
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.LightnCandy::enc('name', $cx, $in).', you have just won $'.LightnCandy::enc('value', $cx, $in).'!
This is next line.'.LightnCandy::enc('empty_var', $cx, $in).'
';
}
?>