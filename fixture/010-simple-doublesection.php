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
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, ((is_array($in['winner']) && isset($in['winner']['name'])) ? $in['winner']['name'] : null)).', you have just won $'.LCRun3::encq($cx, ((is_array($in['winner']) && isset($in['winner']['value'])) ? $in['winner']['value'] : null)).'!
'.LCRun3::sec($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null), $in, false, function($cx, $in) {return '
Line 1
';}).'
This is a test, test = '.LCRun3::encq($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null)).'
'.LCRun3::sec($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null), $in, false, function($cx, $in) {return '
Line 2
';}).'
'.((LCRun3::isec($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null))) ? '
Line 3
' : '').'
'.((LCRun3::isec($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null))) ? '
Line 4
' : '').'
'.LCRun3::sec($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null), $in, false, function($cx, $in) {return '
Line 5
';}).'
'.((LCRun3::isec($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null))) ? '
Line 6
' : '').'
---- double section ----
'.LCRun3::sec($cx, ((is_array($in) && isset($in['sec'])) ? $in['sec'] : null), $in, false, function($cx, $in) {return '
'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).':'.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).'
'.LCRun3::sec($cx, ((is_array($in) && isset($in['sec'])) ? $in['sec'] : null), $in, false, function($cx, $in) {return '-- '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', '.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).'--';}).'
';}).' 
';
}
?>