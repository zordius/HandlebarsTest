<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.LightnCandy::enc('winner.name', $cx, $in).', you have just won $'.LightnCandy::enc('winner.value', $cx, $in).'!
We have $'.LightnCandy::enc('award.first.value', $cx, $in).' for '.LightnCandy::enc('award.first.name', $cx, $in).' award!!
Raw dot test: '.LightnCandy::enc('winner.name', $cx, $in).' '.LightnCandy::raw('award.first.value', $cx, $in).' for '.LightnCandy::raw('award.first.name', $cx, $in).'
';
}
?>