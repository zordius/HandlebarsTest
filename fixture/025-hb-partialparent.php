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
  - EACH 1 - '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).' ~ '.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null)).'
  Name:'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', Value:'.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null)).'

  - EACH 2- '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).' ~ '.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null)).'
';}).'
end section.

##1 start each:
'.LCRun3::sec($cx, ((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $in, true, function($cx, $in) {return '
  - EACH 3 - '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).' ~ '.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null)).'
  Name:'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', Value:'.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null)).'

  - EACH 4 - '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).' ~ '.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null)).'
';}).'
end each.

##2 start each+if:
'.LCRun3::sec($cx, ((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $in, true, function($cx, $in) {return '
 '.LCRun3::ifv($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null), $in, function($cx, $in) {return '
  Name:'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', Value:'.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null)).'

 ';}).'
';}).'
end each+if.

##3 start each+if+with:
'.LCRun3::sec($cx, ((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $in, true, function($cx, $in) {return '
 '.LCRun3::ifv($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null), $in, function($cx, $in) {return '
  '.LCRun3::wi($cx, ((is_array($in) && isset($in['people'])) ? $in['people'] : null), $in, function($cx, $in) {return '
   Name:'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', Value:'.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null)).'

  ';}).'
 ';}).'
';}).'
end each+if+with.

##4 start each+with+if:
'.LCRun3::sec($cx, ((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $in, true, function($cx, $in) {return '
 '.LCRun3::wi($cx, ((is_array($in) && isset($in['people'])) ? $in['people'] : null), $in, function($cx, $in) {return '
  '.LCRun3::ifv($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null), $in, function($cx, $in) {return '
   Name:'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', Value:'.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null)).'

  ';}).'
 ';}).'
';}).'
end each+with+if.
';
}
?>