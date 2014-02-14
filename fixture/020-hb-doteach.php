<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
<ul>
'.LCRun::sec('people]boss', $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun::encq('name', $cx, $in).' is a '.LCRun::encq('gender', $cx, $in).' ('.LCRun::encq('name', $cx, $in).', '.LCRun::encq('value', $cx, $in).', '.LCRun::encq('end', $cx, $in).')</li>
';}).'
</ul>
'.LCRun::encq('end', $cx, $in).'
'.LCRun::sec('people]boss', $cx, $in, false, function($cx, $in) {return '
 THIS:'.LCRun::encq('name', $cx, $in).' is a '.LCRun::raw('gender', $cx, $in).'
 PARENT: '.LCRun::raw('name', $cx, $in).', '.LCRun::raw('value', $cx, $in).', '.LCRun::raw('end', $cx, $in).'
';}).'
';
}
?>