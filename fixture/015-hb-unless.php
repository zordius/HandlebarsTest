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
'.(!LightnCandy::ifvar('test', $in) ? ('
Yes! '.htmlentities($in['name'], ENT_QUOTES).' is '.htmlentities($in['gender'], ENT_QUOTES).'
') : '').'
'.(!LightnCandy::ifvar('test', $in) ? ('
2nd If, '.htmlentities($in['name'], ENT_QUOTES).' is '.$in['gender'].'
') : ('
Else test, '.htmlentities($in['name'], ENT_QUOTES).' is '.htmlentities($in['gender'], ENT_QUOTES).'
')).'
'.htmlentities($in['end'], ENT_QUOTES).'
';
}
?>