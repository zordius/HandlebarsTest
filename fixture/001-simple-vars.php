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
This is next line.'.htmlentities($in['empty_var'], ENT_QUOTES).'中文
Test \on \'spacing in mustache: Hello '.htmlentities($in['name'], ENT_QUOTES).', you have just won $'.htmlentities($in['value'], ENT_QUOTES).'!
';
}
?>