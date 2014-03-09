<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq((is_array($in['winner']) ? $in['winner']['name'] : null), $cx).', you have just won $'.LCRun2::encq((is_array($in['winner']) ? $in['winner']['value'] : null), $cx).'!
We have $'.LCRun2::encq((is_array($in['award']['first']) ? $in['award']['first']['value'] : null), $cx).' for '.LCRun2::encq((is_array($in['award']['first']) ? $in['award']['first']['name'] : null), $cx).' award!!
Raw dot test: '.LCRun2::encq((is_array($in['winner']) ? $in['winner']['name'] : null), $cx).' '.LCRun2::raw((is_array($in['award']['first']) ? $in['award']['first']['value'] : null), $cx).' for '.LCRun2::raw((is_array($in['award']['first']) ? $in['award']['first']['name'] : null), $cx).'
';
}
?>