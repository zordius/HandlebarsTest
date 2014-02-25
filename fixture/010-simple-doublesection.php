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
    return 'Hello '.LCRun::encq('winner]name', $cx, $in).', you have just won $'.LCRun::encq('winner]value', $cx, $in).'!
'.LCRun::sec('test', $cx, $in, false, function($cx, $in) {return '
Line 1
';}).'
This is a test, test = '.LCRun::encq('test', $cx, $in).'
'.LCRun::sec('test', $cx, $in, false, function($cx, $in) {return '
Line 2
';}).'
'.((LCRun::isec('test', $cx, $in)) ? '
Line 3
' : '').'
'.((LCRun::isec('test', $cx, $in)) ? '
Line 4
' : '').'
'.LCRun::sec('test', $cx, $in, false, function($cx, $in) {return '
Line 5
';}).'
'.((LCRun::isec('test', $cx, $in)) ? '
Line 6
' : '').'
---- double section ----
'.LCRun::sec('sec', $cx, $in, false, function($cx, $in) {return '
'.LCRun::encq('name', $cx, $in).':'.LCRun::encq('value', $cx, $in).'
'.LCRun::sec('sec', $cx, $in, false, function($cx, $in) {return '-- '.LCRun::encq('name', $cx, $in).', '.LCRun::encq('value', $cx, $in).'--';}).'
';}).' 
';
}
?>