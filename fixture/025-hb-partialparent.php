<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!

##0 start section:
'.LCRun2::sec(((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $cx, $in, false, function($cx, $in) {return '
  - EACH 1 - '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' ~ '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).'
  Name:'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', Value:'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).', This: '.LCRun2::encq($in, $cx).', Test: '.LCRun2::encq(((is_array($in) && isset($in['test'])) ? $in['test'] : null), $cx).'

  - EACH 2- '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' ~ '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).'
';}).'
end section.

##1 start each:
'.LCRun2::sec(((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $cx, $in, true, function($cx, $in) {return '
  - EACH 3 - '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' ~ '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).'
  Name:'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', Value:'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).', This: '.LCRun2::encq($in, $cx).', Test: '.LCRun2::encq(((is_array($in) && isset($in['test'])) ? $in['test'] : null), $cx).'

  - EACH 4 - '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' ~ '.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['name'])) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).'
';}).'
end each.

##2 start each+if:
'.LCRun2::sec(((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $cx, $in, true, function($cx, $in) {return '
 '.LCRun2::ifv(((is_array($in) && isset($in['test'])) ? $in['test'] : null), $cx, $in, function($cx, $in) {return '
  Name:'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', Value:'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).', This: '.LCRun2::encq($in, $cx).', Test: '.LCRun2::encq(((is_array($in) && isset($in['test'])) ? $in['test'] : null), $cx).'

 ';}).'
';}).'
end each+if.

##3 start each+if+with:
'.LCRun2::sec(((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $cx, $in, true, function($cx, $in) {return '
 '.LCRun2::ifv(((is_array($in) && isset($in['test'])) ? $in['test'] : null), $cx, $in, function($cx, $in) {return '
  '.LCRun2::wi(((is_array($in) && isset($in['people'])) ? $in['people'] : null), $cx, $in, function($cx, $in) {return '
   Name:'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', Value:'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).', This: '.LCRun2::encq($in, $cx).', Test: '.LCRun2::encq(((is_array($in) && isset($in['test'])) ? $in['test'] : null), $cx).'

  ';}).'
 ';}).'
';}).'
end each+if+with.

##4 start each+with+if:
'.LCRun2::sec(((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $cx, $in, true, function($cx, $in) {return '
 '.LCRun2::wi(((is_array($in) && isset($in['people'])) ? $in['people'] : null), $cx, $in, function($cx, $in) {return '
  '.LCRun2::ifv(((is_array($in) && isset($in['test'])) ? $in['test'] : null), $cx, $in, function($cx, $in) {return '
   Name:'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', Value:'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).', This: '.LCRun2::encq($in, $cx).', Test: '.LCRun2::encq(((is_array($in) && isset($in['test'])) ? $in['test'] : null), $cx).'

  ';}).'
 ';}).'
';}).'
end each+with+if.
';
}
?>