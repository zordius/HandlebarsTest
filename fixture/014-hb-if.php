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
'.(LightnCandy::ifvar('test', $in) ? ('
Yes! '.LightnCandy::enc('name', $cx, $in).' is '.LightnCandy::enc('gender', $cx, $in).'
') : '').'
'.(LightnCandy::ifvar('test', $in) ? ('
2nd If, '.LightnCandy::enc('name', $cx, $in).' is '.LightnCandy::raw('gender', $cx, $in).'
') : ('
Else test, '.LightnCandy::enc('name', $cx, $in).' is '.LightnCandy::enc('gender', $cx, $in).'
')).'
'.LightnCandy::enc('end', $cx, $in).'
';
}
?>