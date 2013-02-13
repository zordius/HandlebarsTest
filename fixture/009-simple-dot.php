<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => false,
            'jsobj' => false
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.htmlentities($in['winner']['name'], ENT_QUOTES).', you have just won $'.htmlentities($in['winner']['value'], ENT_QUOTES).'!
We have $'.htmlentities($in['award']['first']['value'], ENT_QUOTES).' for '.htmlentities($in['award']['first']['name'], ENT_QUOTES).' award!!
Raw dot test: '.htmlentities($in['winner']['name'], ENT_QUOTES).' '.$in['award']['first']['value'].' for '.$in['award']['first']['name'].'
';
}
?>