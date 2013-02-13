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
'.LightnCandy::sec('test', $cx, $in, false, function($cx, $in) {return ''.'
This is true! won $'.htmlentities($in['value'], ENT_QUOTES).'!!
';}).'
';
}
?>