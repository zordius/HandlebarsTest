<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
<ul>
'.LCRun::sec('', $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun::encq('name', $cx, $in).' is a '.LCRun::encq('gender', $cx, $in).' ('.LCRun::encq('../name', $cx, $in).', '.LCRun::encq('../value', $cx, $in).', '.LCRun::encq('../end', $cx, $in).')</li>
 simple if~
 '.LCRun::ifv('good', $cx, $in, function($cx, $in) {return '
  simple GOOD! '.LCRun::encq('goodchild', $cx, $in).' '.LCRun::encq('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' X '.LCRun::encq('../../name', $cx, $in).' ~ '.LCRun::encq('../../end', $cx, $in).'
 ';}).'
 if-else
 '.LCRun::ifv('good', $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun::encq('goodchild', $cx, $in).' '.LCRun::encq('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' X '.LCRun::encq('../../name', $cx, $in).' ~ '.LCRun::encq('../../end', $cx, $in).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun::encq('badchild', $cx, $in).' '.LCRun::encq('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' Y '.LCRun::raw('../../name', $cx, $in).' = '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
 with
 '.LCRun::wi('good', $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun::encq('gender', $cx, $in).', '.LCRun::encq('../gender', $cx, $in).' , '.LCRun::encq('../../name', $cx, $in).' , '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
 simple unless
 '.LCRun::unl('good', $cx, $in, function($cx, $in) {return '
   UNLESS good = bad -> '.LCRun::encq('../gender', $cx, $in).' , '.LCRun::encq('../../name', $cx, $in).'
 ';}).'
 unless else
 '.LCRun::unl('good', $cx, $in, function($cx, $in) {return '
   UNLESS good = bad -> '.LCRun::encq('../gender', $cx, $in).' , '.LCRun::encq('../../name', $cx, $in).'
 ';}, function($cx, $in) {return '
   UNLESS bad = good -> '.LCRun::encq('../gender', $cx, $in).' , '.LCRun::encq('../../name', $cx, $in).'
 ';}).'
';}).'
----------THIS
'.LCRun::sec('', $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun::encq('name', $cx, $in).' is a '.LCRun::encq('gender', $cx, $in).' ('.LCRun::encq('../name', $cx, $in).', '.LCRun::encq('../value', $cx, $in).', '.LCRun::encq('../end', $cx, $in).')</li>
 '.LCRun::ifv('good', $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun::encq('goodchild', $cx, $in).' '.LCRun::encq('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' X '.LCRun::encq('../../name', $cx, $in).' ~ '.LCRun::encq('../../end', $cx, $in).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun::encq('badchild', $cx, $in).' '.LCRun::encq('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' Y '.LCRun::raw('../../name', $cx, $in).' = '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
 '.LCRun::wi('good', $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun::encq('../gender', $cx, $in).' , '.LCRun::encq('../../name', $cx, $in).' , '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
';}).'
----------SECTION THIS
'.LCRun::sec('', $cx, $in, false, function($cx, $in) {return '
 <li>'.LCRun::encq('name', $cx, $in).' is a '.LCRun::encq('gender', $cx, $in).' ('.LCRun::encq('../name', $cx, $in).', '.LCRun::encq('../value', $cx, $in).', '.LCRun::encq('../end', $cx, $in).')</li>
 '.LCRun::ifv('good', $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun::encq('goodchild', $cx, $in).' '.LCRun::encq('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' X '.LCRun::encq('../../name', $cx, $in).' ~ '.LCRun::encq('../../end', $cx, $in).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun::encq('badchild', $cx, $in).' '.LCRun::encq('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' Y '.LCRun::raw('../../name', $cx, $in).' = '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
 '.LCRun::wi('good', $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun::encq('../gender', $cx, $in).' , '.LCRun::encq('../../name', $cx, $in).' , '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
';}).'
----------SECTION .
'.LCRun::sec('', $cx, $in, false, function($cx, $in) {return '
 <li>'.LCRun::encq('name', $cx, $in).' is a '.LCRun::encq('gender', $cx, $in).' ('.LCRun::encq('../name', $cx, $in).', '.LCRun::encq('../value', $cx, $in).', '.LCRun::encq('../end', $cx, $in).')</li>
 '.LCRun::ifv('good', $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun::encq('goodchild', $cx, $in).' '.LCRun::encq('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' X '.LCRun::encq('../../name', $cx, $in).' ~ '.LCRun::encq('../../end', $cx, $in).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun::encq('badchild', $cx, $in).' '.LCRun::encq('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' Y '.LCRun::raw('../../name', $cx, $in).' = '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
 '.LCRun::wi('good', $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun::encq('../gender', $cx, $in).' , '.LCRun::encq('../../name', $cx, $in).' , '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
';}).'
</ul>
WITH TEST>
'.LCRun::wi('people', $cx, $in, function($cx, $in) {return '
 single: '.LCRun::encq('name', $cx, $in).', '.LCRun::encq('gender', $cx, $in).'
 '.LCRun::sec('', $cx, $in, true, function($cx, $in) {return 'loop: '.LCRun::encq('name', $cx, $in).' - '.LCRun::encq('../name', $cx, $in).' - '.LCRun::encq('../../name', $cx, $in).'';}).'
';}).'
'.LCRun::encq('end', $cx, $in).'
';
}
?>