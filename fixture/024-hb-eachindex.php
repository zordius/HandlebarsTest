<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return '<ul>
'.LCRun::sec('people', $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun::enc('@index', $cx, $in).', '.LCRun::enc('@key', $cx, $in).' : '.LCRun::enc('name', $cx, $in).' '.((LCRun::ifvar('name', $cx, $in)) ? '(V)' : '').''.((LCRun::ifvar('../test', $cx, $in)) ? '(Y)' : '').'</li>
';}).'
</ul>
';
}
?>