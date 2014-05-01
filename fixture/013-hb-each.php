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
    return 'Hello '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', you have just won $'.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).'!
<ul>
'.LCRun3::sec($cx, ((is_array($in) && isset($in['people'])) ? $in['people'] : null), $in, true, function($cx, $in) {return '
 <li>'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).' is a '.LCRun3::encq($cx, ((is_array($in) && isset($in['gender'])) ? $in['gender'] : null)).'</li>
';}).'
</ul>
'.LCRun3::encq($cx, ((is_array($in) && isset($in['end'])) ? $in['end'] : null)).'
';
}
?>