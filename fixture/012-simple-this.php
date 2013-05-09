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
Winners: '.LightnCandy::sec('winners', $cx, $in, false, function($cx, $in) {return ''.LightnCandy::enc('', $cx, $in).'('.LightnCandy::raw('', $cx, $in).') = '.LightnCandy::enc('', $cx, $in).'('.LightnCandy::raw('', $cx, $in).')';}).'
';
}
?>