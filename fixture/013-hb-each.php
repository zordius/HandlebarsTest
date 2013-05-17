<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
<ul>
'.LCRun::sec('people', $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun::enc('name', $cx, $in).' is a '.LCRun::enc('gender', $cx, $in).'</li>
';}).'
</ul>
'.LCRun::enc('end', $cx, $in).'
';
}
?>