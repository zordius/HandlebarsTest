<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
This is next line.
'.LCRun::sec('test', $cx, $in, false, function($cx, $in) {return '
This is true! won $'.LCRun::enc('value', $cx, $in).'!!
';}).'
'.(LCRun::isec('test', $in) ? ('
No, this is fake! not win $'.LCRun::enc('value', $cx, $in).'!!
') : '').'
';
}
?>