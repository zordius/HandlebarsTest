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
    return 'Hello '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'!
<ul>
'.LCRun2::sec((is_array($in['people']) ? $in['people']['boss'] : null), $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' is a '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).' ('.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', '.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).', '.LCRun2::encq((is_array($in) ? $in['end'] : null), $cx).')</li>
';}).'
</ul>
'.LCRun2::encq((is_array($in) ? $in['end'] : null), $cx).'
'.LCRun2::sec((is_array($in['people']) ? $in['people']['boss'] : null), $cx, $in, false, function($cx, $in) {return '
 THIS:'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' is a '.LCRun2::raw((is_array($in) ? $in['gender'] : null), $cx).'
 PARENT: '.LCRun2::raw((is_array($in) ? $in['name'] : null), $cx).', '.LCRun2::raw((is_array($in) ? $in['value'] : null), $cx).', '.LCRun2::raw((is_array($in) ? $in['end'] : null), $cx).'
';}).'
';
}
?>