<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => false,
            'jsobj' => false
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.htmlentities($in['name'], ENT_QUOTES).', you have just won $'.htmlentities($in['value'], ENT_QUOTES).'!
<ul>
'.LightnCandy::sec('.', $cx, $in, true, function($cx, $in) {return '
 <li>'.htmlentities($in['name'], ENT_QUOTES).' is a '.htmlentities($in['gender'], ENT_QUOTES).'</li>
';}).'
</ul>
'.htmlentities($in['end'], ENT_QUOTES).'
'.LightnCandy::sec('this', $cx, $in, true, function($cx, $in) {return '
 THIS:'.htmlentities($in['name'], ENT_QUOTES).' is a '.$in['gender'].'
';}).'
';
}
?>