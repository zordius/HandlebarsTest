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
<ul>
'.LightnCandy::sec('people', $cx, $in, true, function($cx, $in) {return '
 <li>'.LightnCandy::enc('name', $cx, $in).' is a '.LightnCandy::enc('gender', $cx, $in).'</li>
';}).'
</ul>
'.LightnCandy::enc('end', $cx, $in).'
';
}
?>