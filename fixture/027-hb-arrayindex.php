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

##0 start section:
'.LCRun3::sec($cx, ((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $in, false, function($cx, $in) {return '
  - EACH 1- '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).'
';}).'
end section.

##1 start each:
'.LCRun3::sec($cx, ((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $in, true, function($cx, $in) {return '
  - EACH 2 - '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).'
';}).'
end each.

##3 Index
Index ?: '.LCRun3::encq($cx, ((is_array($in['winners']) && isset($in['winners']['name'])) ? $in['winners']['name'] : null)).'
Index 0: '.LCRun3::encq($cx, ((is_array($in['winners']['0']) && isset($in['winners']['0']['name'])) ? $in['winners']['0']['name'] : null)).'
Index 1: '.LCRun3::encq($cx, ((is_array($in['winners']['1']) && isset($in['winners']['1']['name'])) ? $in['winners']['1']['name'] : null)).'
';
}
?>