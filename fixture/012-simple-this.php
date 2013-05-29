<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array(),
        'path' => Array(),
        'parents' => Array(),

    );
    return 'Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
Winners: '.LCRun::sec('winners', $cx, $in, false, function($cx, $in) {return ''.LCRun::enc('', $cx, $in).'('.LCRun::raw('', $cx, $in).') = '.LCRun::enc('', $cx, $in).'('.LCRun::raw('', $cx, $in).')';}).'
';
}
?>