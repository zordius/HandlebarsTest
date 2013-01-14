<?php return function ($in) {
    $cx = Array(
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.LightnCandy::enc('name', $cx, $in).', you have just won $'.LightnCandy::enc('value', $cx, $in).'!
Hello original '.LightnCandy::raw('name', $cx, $in).' , the value is '.LightnCandy::raw('value', $cx, $in).'
';
}
?>