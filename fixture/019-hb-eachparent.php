<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
<ul>
'.LCRun2::sec($in, $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' is a '.LCRun2::encq(((is_array($in) && isset($in['gender'])) ? $in['gender'] : null), $cx).' ('.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).', '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['value'])) ? $cx['scopes'][count($cx['scopes'])-1]['value'] : null), $cx).', '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['end'])) ? $cx['scopes'][count($cx['scopes'])-1]['end'] : null), $cx).')</li>
';}).'
</ul>
'.LCRun2::encq(((is_array($in) && isset($in['end'])) ? $in['end'] : null), $cx).'
'.LCRun2::sec($in, $cx, $in, true, function($cx, $in) {return '
 THIS:'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' is a '.LCRun2::raw(((is_array($in) && isset($in['gender'])) ? $in['gender'] : null), $cx).'
 PARENT: '.LCRun2::raw(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).', '.LCRun2::raw(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['value'])) ? $cx['scopes'][count($cx['scopes'])-1]['value'] : null), $cx).', '.LCRun2::raw(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['end'])) ? $cx['scopes'][count($cx['scopes'])-1]['end'] : null), $cx).' END '.LCRun2::encq(((is_array($in) && isset($in['end'])) ? $in['end'] : null), $cx).' NAME '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).'
';}).'
Section This:
'.LCRun2::sec($in, $cx, $in, false, function($cx, $in) {return '
 <li>X~'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' is a '.LCRun2::encq(((is_array($in) && isset($in['gender'])) ? $in['gender'] : null), $cx).' ('.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).', '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['value'])) ? $cx['scopes'][count($cx['scopes'])-1]['value'] : null), $cx).', '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['end'])) ? $cx['scopes'][count($cx['scopes'])-1]['end'] : null), $cx).')</li>
';}).'
Section Var:
'.LCRun2::sec(((is_array($in) && isset($in['people'])) ? $in['people'] : null), $cx, $in, false, function($cx, $in) {return '
 <li>XXXVAR'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' is a '.LCRun2::encq(((is_array($in) && isset($in['gender'])) ? $in['gender'] : null), $cx).' ('.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).', '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['value'])) ? $cx['scopes'][count($cx['scopes'])-1]['value'] : null), $cx).', '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['end'])) ? $cx['scopes'][count($cx['scopes'])-1]['end'] : null), $cx).')</li>
';}).'
Each Var:
'.LCRun2::sec(((is_array($in) && isset($in['people'])) ? $in['people'] : null), $cx, $in, true, function($cx, $in) {return '
 <li>XXX-EACH-VAR'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' is a '.LCRun2::encq(((is_array($in) && isset($in['gender'])) ? $in['gender'] : null), $cx).' ('.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).', '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['value'])) ? $cx['scopes'][count($cx['scopes'])-1]['value'] : null), $cx).', '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['end'])) ? $cx['scopes'][count($cx['scopes'])-1]['end'] : null), $cx).')</li>
';}).'
';
}
?>