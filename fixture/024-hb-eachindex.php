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
    return '<ul>
'.LCRun::sec('people', $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun::encq('@index', $cx, $in).', '.LCRun::encq('@key', $cx, $in).' : '.LCRun::encq('name', $cx, $in).' '.((LCRun::ifvar('name', $cx, $in)) ? '(V)' : '').''.((LCRun::ifvar('../test', $cx, $in)) ? '(Y)' : '').'</li>
';}).'
</ul>
';
}
?>