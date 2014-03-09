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
    return 'Hello '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'!
<ul>
'.LCRun2::sec($in, $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' is a '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).' ('.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['value'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['end'] : null), $cx).')</li>
 simple if~
 '.LCRun2::ifv((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
  simple GOOD! '.LCRun2::encq((is_array($in) ? $in['goodchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' X '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' ~ '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
 if-else
 '.LCRun2::ifv((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun2::encq((is_array($in) ? $in['goodchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' X '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' ~ '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun2::encq((is_array($in) ? $in['badchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' Y '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' = '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
 with
 '.LCRun2::wi((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' , '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
 simple unless
 '.LCRun2::unl((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
   UNLESS good = bad -> '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).'
 ';}).'
 unless else
 '.LCRun2::unl((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
   UNLESS good = bad -> '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).'
 ';}, function($cx, $in) {return '
   UNLESS bad = good -> '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).'
 ';}).'
';}).'
----------THIS
'.LCRun2::sec($in, $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' is a '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).' ('.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['value'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['end'] : null), $cx).')</li>
 '.LCRun2::ifv((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun2::encq((is_array($in) ? $in['goodchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' X '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' ~ '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun2::encq((is_array($in) ? $in['badchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' Y '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' = '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
 '.LCRun2::wi((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' , '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
';}).'
----------SECTION THIS
'.LCRun2::sec($in, $cx, $in, false, function($cx, $in) {return '
 <li>'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' is a '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).' ('.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['value'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['end'] : null), $cx).')</li>
 '.LCRun2::ifv((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun2::encq((is_array($in) ? $in['goodchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' X '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' ~ '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun2::encq((is_array($in) ? $in['badchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' Y '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' = '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
 '.LCRun2::wi((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' , '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
';}).'
----------SECTION .
'.LCRun2::sec($in, $cx, $in, false, function($cx, $in) {return '
 <li>'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' is a '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).' ('.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['value'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['end'] : null), $cx).')</li>
 '.LCRun2::ifv((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun2::encq((is_array($in) ? $in['goodchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' X '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' ~ '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun2::encq((is_array($in) ? $in['badchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' Y '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' = '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
 '.LCRun2::wi((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' , '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
';}).'
</ul>
WITH TEST>
'.LCRun2::wi((is_array($in) ? $in['people'] : null), $cx, $in, function($cx, $in) {return '
 single: '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).' , p -> '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).'
 '.LCRun2::sec($in, $cx, $in, true, function($cx, $in) {return 'loop: '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' - '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).' - '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).'';}).'
';}).'
'.LCRun2::encq((is_array($in) ? $in['end'] : null), $cx).'
';
}
?>