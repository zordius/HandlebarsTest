<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => 0,
            'jsobj' => 0
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.htmlentities($in['name'], ENT_QUOTES).', you have just won $'.htmlentities($in['value'], ENT_QUOTES).'!
This is next line.'.htmlentities($in['empty_var'], ENT_QUOTES).'中文
Test on spacing in mustache: Hello '.htmlentities($in['name'], ENT_QUOTES).', you have just won $'.htmlentities($in['value'], ENT_QUOTES).'! '.htmlentities($in['key with  space'], ENT_QUOTES).' - '.$in['key with  space'].'
';
}
?>