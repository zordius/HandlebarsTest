<?php return function ($in) {
    $cx = Array(
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.LightnCandy::enc('winner.name', $cx, $in).', you have just won $'.LightnCandy::enc('winner.value', $cx, $in).'!
'.LightnCandy::sec('test', $cx, $in, false, function($cx, $in) {return '
Line 1
';}).'
This is a test, test = '.LightnCandy::enc('test', $cx, $in).'
'.LightnCandy::sec('test', $cx, $in, false, function($cx, $in) {return '
Line 2
';}).'
';
}
?>