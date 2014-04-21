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
'.LCRun2::sec(((is_array($in) && isset($in['test'])) ? $in['test'] : null), $cx, $in, false, function($cx, $in) {return ''.'
This is true! won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!!
';}).'
';
}
?>