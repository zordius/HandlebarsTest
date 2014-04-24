<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
<ul>
'.LCRun2::sec($in, $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' is a '.LCRun2::encq(((is_array($in) && isset($in['gender'])) ? $in['gender'] : null), $cx).'</li>
';}).'
</ul>
- '.LCRun2::encq(((is_array($in) && isset($in['end'])) ? $in['end'] : null), $cx).' -
'.LCRun2::sec($in, $cx, $in, true, function($cx, $in) {return '
 THIS:'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' is a '.LCRun2::raw(((is_array($in) && isset($in['gender'])) ? $in['gender'] : null), $cx).'
';}).'
==
';
}
?>