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
'.LCRun::sec('', $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun::enc('name', $cx, $in).' is a '.LCRun::enc('gender', $cx, $in).' ('.LCRun::enc('../name', $cx, $in).', '.LCRun::enc('../value', $cx, $in).', '.LCRun::enc('../end', $cx, $in).')</li>
';}).'
</ul>
'.LCRun::enc('end', $cx, $in).'
'.LCRun::sec('', $cx, $in, true, function($cx, $in) {return '
 THIS:'.LCRun::enc('name', $cx, $in).' is a '.LCRun::raw('gender', $cx, $in).'
 PARENT: '.LCRun::raw('../name', $cx, $in).', '.LCRun::raw('../value', $cx, $in).', '.LCRun::raw('../end', $cx, $in).'
';}).'
';
}
?>