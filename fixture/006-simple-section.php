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
'.LCRun::sec('people', $cx, $in, false, function($cx, $in) {return '
 <li>'.LCRun::encq('name', $cx, $in).' is a '.LCRun::encq('gender', $cx, $in).'</li>
';}).'
</ul>
'.LCRun::encq('end', $cx, $in).'
';
}
?>