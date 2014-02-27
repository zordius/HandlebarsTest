<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(            'helper1' => function($url, $txt) {
                $u = ($url !== null) ? $url : 'undefined';
                $t = ($txt !== null) ? $txt : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>";
            },
),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
<ul>
'.LCRun::sec('', $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun::encq('name', $cx, $in).' is a '.LCRun::encq('gender', $cx, $in).' ('.LCRun::encq('../name', $cx, $in).', '.LCRun::encq('../value', $cx, $in).', '.LCRun::encq('../end', $cx, $in).')</li>
';}).'
</ul>
'.LCRun::encq('end', $cx, $in).'
'.LCRun::sec('', $cx, $in, true, function($cx, $in) {return '
 THIS:'.LCRun::encq('name', $cx, $in).' is a '.LCRun::raw('gender', $cx, $in).'
 PARENT: '.LCRun::raw('../name', $cx, $in).', '.LCRun::raw('../value', $cx, $in).', '.LCRun::raw('../end', $cx, $in).' END '.LCRun::encq('end', $cx, $in).' NAME '.LCRun::encq('name', $cx, $in).'
';}).'
Section This:
'.LCRun::sec('', $cx, $in, false, function($cx, $in) {return '
 <li>X~'.LCRun::encq('name', $cx, $in).' is a '.LCRun::encq('gender', $cx, $in).' ('.LCRun::encq('../name', $cx, $in).', '.LCRun::encq('../value', $cx, $in).', '.LCRun::encq('../end', $cx, $in).')</li>
';}).'
Section Var:
'.LCRun::sec('people', $cx, $in, false, function($cx, $in) {return '
 <li>XXXVAR'.LCRun::encq('name', $cx, $in).' is a '.LCRun::encq('gender', $cx, $in).' ('.LCRun::encq('../name', $cx, $in).', '.LCRun::encq('../value', $cx, $in).', '.LCRun::encq('../end', $cx, $in).')</li>
';}).'
Each Var:
'.LCRun::sec('people', $cx, $in, true, function($cx, $in) {return '
 <li>XXX-EACH-VAR'.LCRun::encq('name', $cx, $in).' is a '.LCRun::encq('gender', $cx, $in).' ('.LCRun::encq('../name', $cx, $in).', '.LCRun::encq('../value', $cx, $in).', '.LCRun::encq('../end', $cx, $in).')</li>
';}).'
';
}
?>