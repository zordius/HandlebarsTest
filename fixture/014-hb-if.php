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
'.((LCRun3::ifvar($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null))) ? '
Yes! '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).' is '.LCRun3::encq($cx, ((is_array($in) && isset($in['gender'])) ? $in['gender'] : null)).'
' : '').'
'.((LCRun3::ifvar($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null))) ? '
2nd If, '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).' is '.LCRun3::raw($cx, ((is_array($in) && isset($in['gender'])) ? $in['gender'] : null)).'
' : '
Else test, '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).' is '.LCRun3::encq($cx, ((is_array($in) && isset($in['gender'])) ? $in['gender'] : null)).'
').'
-TEST PATH-
'.((LCRun3::ifvar($cx, ((is_array($in['test']) && isset($in['test']['name'])) ? $in['test']['name'] : null))) ? '
Yes! '.LCRun3::encq($cx, ((is_array($in) && isset($in['subname'])) ? $in['subname'] : null)).'
' : '
No! '.LCRun3::encq($cx, ((is_array($in) && isset($in['subname'])) ? $in['subname'] : null)).'
').'
'.LCRun3::encq($cx, ((is_array($in) && isset($in['end'])) ? $in['end'] : null)).'
';
}
?>