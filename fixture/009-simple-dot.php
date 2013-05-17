<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.LCRun::enc('winner.name', $cx, $in).', you have just won $'.LCRun::enc('winner.value', $cx, $in).'!
We have $'.LCRun::enc('award.first.value', $cx, $in).' for '.LCRun::enc('award.first.name', $cx, $in).' award!!
Raw dot test: '.LCRun::enc('winner.name', $cx, $in).' '.LCRun::raw('award.first.value', $cx, $in).' for '.LCRun::raw('award.first.name', $cx, $in).'
';
}
?>