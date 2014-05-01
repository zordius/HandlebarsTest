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

    );
    return 'Hello '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', you have just won $'.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).'!
<ul>
'.LCRun3::sec($cx, ((is_array($in['people']) && isset($in['people']['boss'])) ? $in['people']['boss'] : null), $in, true, function($cx, $in) {return '
 <li>'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).' is a '.LCRun3::encq($cx, ((is_array($in) && isset($in['gender'])) ? $in['gender'] : null)).' ('.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', '.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).', '.LCRun3::encq($cx, ((is_array($in) && isset($in['end'])) ? $in['end'] : null)).')</li>
';}).'
</ul>
'.LCRun3::encq($cx, ((is_array($in) && isset($in['end'])) ? $in['end'] : null)).'
'.LCRun3::sec($cx, ((is_array($in['people']) && isset($in['people']['boss'])) ? $in['people']['boss'] : null), $in, false, function($cx, $in) {return '
 THIS:'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).' is a '.LCRun3::raw($cx, ((is_array($in) && isset($in['gender'])) ? $in['gender'] : null)).'
 PARENT: '.LCRun3::raw($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', '.LCRun3::raw($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).', '.LCRun3::raw($cx, ((is_array($in) && isset($in['end'])) ? $in['end'] : null)).'
';}).'
';
}
?>