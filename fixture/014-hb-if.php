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
'.((LCRun::ifvar('test', $cx, $in)) ? '
Yes! '.LCRun::encq('name', $cx, $in).' is '.LCRun::encq('gender', $cx, $in).'
' : '').'
'.((LCRun::ifvar('test', $cx, $in)) ? '
2nd If, '.LCRun::encq('name', $cx, $in).' is '.LCRun::raw('gender', $cx, $in).'
' : '
Else test, '.LCRun::encq('name', $cx, $in).' is '.LCRun::encq('gender', $cx, $in).'
').'
-TEST PATH-
'.((LCRun::ifvar('test]name', $cx, $in)) ? '
Yes! '.LCRun::encq('subname', $cx, $in).'
' : '
No! '.LCRun::encq('subname', $cx, $in).'
').'
'.LCRun::encq('end', $cx, $in).'
';
}
?>