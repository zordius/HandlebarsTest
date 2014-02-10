<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun::enc('winner.name', $cx, $in).', you have just won $'.LCRun::enc('winner.value', $cx, $in).'!
'.LCRun::sec('test', $cx, $in, false, function($cx, $in) {return '
Line 1
';}).'
This is a test, test = '.LCRun::enc('test', $cx, $in).'
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
'.LCRun::enc('name', $cx, $in).':'.LCRun::enc('value', $cx, $in).'
'.LCRun::sec('sec', $cx, $in, false, function($cx, $in) {return '-- '.LCRun::enc('name', $cx, $in).', '.LCRun::enc('value', $cx, $in).'--';}).'
';}).' 
';
}
?>