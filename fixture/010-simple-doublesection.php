<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.LightnCandy::enc('winner.name', $cx, $in).', you have just won $'.LightnCandy::enc('winner.value', $cx, $in).'!
'.LightnCandy::sec('test', $cx, $in, false, function($cx, $in) {return '
Line 1
';}).'
This is a test, test = '.LightnCandy::enc('test', $cx, $in).'
'.LightnCandy::sec('test', $cx, $in, false, function($cx, $in) {return '
Line 2
';}).'
'.(LightnCandy::isec('test', $in) ? ('
Line 3
') : '').'
'.(LightnCandy::isec('test', $in) ? ('
Line 4
') : '').'
'.LightnCandy::sec('test', $cx, $in, false, function($cx, $in) {return '
Line 5
';}).'
'.(LightnCandy::isec('test', $in) ? ('
Line 6
') : '').'
---- double section ----
'.LightnCandy::sec('sec', $cx, $in, false, function($cx, $in) {return '
'.LightnCandy::enc('name', $cx, $in).':'.LightnCandy::enc('value', $cx, $in).'
'.LightnCandy::sec('sec', $cx, $in, false, function($cx, $in) {return '-- '.LightnCandy::enc('name', $cx, $in).', '.LightnCandy::enc('value', $cx, $in).'--';}).'
';}).' 
';
}
?>