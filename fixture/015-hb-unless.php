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
'.(!LCRun::ifvar('test', $cx, $in) ? ('
Yes! '.LCRun::enc('name', $cx, $in).' is '.LCRun::enc('gender', $cx, $in).'
') : '').'
'.(!LCRun::ifvar('test', $cx, $in) ? ('
2nd If, '.LCRun::enc('name', $cx, $in).' is '.LCRun::raw('gender', $cx, $in).'
') : ('
Else test, '.LCRun::enc('name', $cx, $in).' is '.LCRun::enc('gender', $cx, $in).'
')).'
'.LCRun::enc('end', $cx, $in).'
';
}
?>