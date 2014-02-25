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
    return 'Hello '.LCRun::encq('winner]name', $cx, $in).', you have just won $'.LCRun::encq('winner]value', $cx, $in).'!
We have $'.LCRun::encq('award]first]value', $cx, $in).' for '.LCRun::encq('award]first]name', $cx, $in).' award!!
Raw dot test: '.LCRun::encq('winner]name', $cx, $in).' '.LCRun::raw('award]first]value', $cx, $in).' for '.LCRun::raw('award]first]name', $cx, $in).'
';
}
?>