<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
Hello original '.LCRun2::raw(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' , the value is '.LCRun2::raw(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'
';
}
?>