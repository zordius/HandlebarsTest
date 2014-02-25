<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
<ul>
'.LCRun::sec('', $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun::encq('name', $cx, $in).' is a '.LCRun::encq('gender', $cx, $in).'</li>
';}).'
</ul>
- '.LCRun::encq('end', $cx, $in).' -
'.LCRun::sec('', $cx, $in, true, function($cx, $in) {return '
 THIS:'.LCRun::encq('name', $cx, $in).' is a '.LCRun::raw('gender', $cx, $in).'
';}).'
==
';
}
?>