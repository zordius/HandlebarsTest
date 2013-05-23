<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array(),
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
<ul>
'.LCRun::sec('', $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun::enc('name', $cx, $in).' is a '.LCRun::enc('gender', $cx, $in).' ('.LCRun::enc('../name', $cx, $in).', '.LCRun::enc('../value', $cx, $in).', '.LCRun::enc('../end', $cx, $in).')</li>
 simple if~
 '.LCRun::ifv('good', $cx, $in, function($cx, $in) {return '
  simple GOOD! '.LCRun::enc('goodchild', $cx, $in).' '.LCRun::enc('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' X '.LCRun::enc('../../name', $cx, $in).' ~ '.LCRun::enc('../../end', $cx, $in).'
 ';}).'
 if-else
 '.LCRun::ifv('good', $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun::enc('goodchild', $cx, $in).' '.LCRun::enc('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' X '.LCRun::enc('../../name', $cx, $in).' ~ '.LCRun::enc('../../end', $cx, $in).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun::enc('badchild', $cx, $in).' '.LCRun::enc('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' Y '.LCRun::raw('../../name', $cx, $in).' = '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
 with
 '.LCRun::wi('good', $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun::enc('gender', $cx, $in).', '.LCRun::enc('../gender', $cx, $in).' , '.LCRun::enc('../../name', $cx, $in).' , '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
 simple unless
 '.LCRun::unl('good', $cx, $in, function($cx, $in) {return '
   UNLESS good = bad -> '.LCRun::enc('../gender', $cx, $in).' , '.LCRun::enc('../../name', $cx, $in).'
 ';}).'
 unless else
 '.LCRun::unl('good', $cx, $in, function($cx, $in) {return '
   UNLESS good = bad -> '.LCRun::enc('../gender', $cx, $in).' , '.LCRun::enc('../../name', $cx, $in).'
 ';}, function($cx, $in) {return '
   UNLESS bad = good -> '.LCRun::enc('../gender', $cx, $in).' , '.LCRun::enc('../../name', $cx, $in).'
 ';}).'
';}).'
----------THIS
'.LCRun::sec('', $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun::enc('name', $cx, $in).' is a '.LCRun::enc('gender', $cx, $in).' ('.LCRun::enc('../name', $cx, $in).', '.LCRun::enc('../value', $cx, $in).', '.LCRun::enc('../end', $cx, $in).')</li>
 '.LCRun::ifv('good', $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun::enc('goodchild', $cx, $in).' '.LCRun::enc('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' X '.LCRun::enc('../../name', $cx, $in).' ~ '.LCRun::enc('../../end', $cx, $in).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun::enc('badchild', $cx, $in).' '.LCRun::enc('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' Y '.LCRun::raw('../../name', $cx, $in).' = '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
 '.LCRun::wi('good', $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun::enc('../gender', $cx, $in).' , '.LCRun::enc('../../name', $cx, $in).' , '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
';}).'
----------SECTION THIS
'.LCRun::sec('', $cx, $in, false, function($cx, $in) {return '
 <li>'.LCRun::enc('name', $cx, $in).' is a '.LCRun::enc('gender', $cx, $in).' ('.LCRun::enc('../name', $cx, $in).', '.LCRun::enc('../value', $cx, $in).', '.LCRun::enc('../end', $cx, $in).')</li>
 '.LCRun::ifv('good', $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun::enc('goodchild', $cx, $in).' '.LCRun::enc('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' X '.LCRun::enc('../../name', $cx, $in).' ~ '.LCRun::enc('../../end', $cx, $in).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun::enc('badchild', $cx, $in).' '.LCRun::enc('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' Y '.LCRun::raw('../../name', $cx, $in).' = '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
 '.LCRun::wi('good', $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun::enc('../gender', $cx, $in).' , '.LCRun::enc('../../name', $cx, $in).' , '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
';}).'
----------SECTION .
'.LCRun::sec('', $cx, $in, false, function($cx, $in) {return '
 <li>'.LCRun::enc('name', $cx, $in).' is a '.LCRun::enc('gender', $cx, $in).' ('.LCRun::enc('../name', $cx, $in).', '.LCRun::enc('../value', $cx, $in).', '.LCRun::enc('../end', $cx, $in).')</li>
 '.LCRun::ifv('good', $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun::enc('goodchild', $cx, $in).' '.LCRun::enc('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' X '.LCRun::enc('../../name', $cx, $in).' ~ '.LCRun::enc('../../end', $cx, $in).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun::enc('badchild', $cx, $in).' '.LCRun::enc('../gender', $cx, $in).' - '.LCRun::raw('../gender', $cx, $in).' Y '.LCRun::raw('../../name', $cx, $in).' = '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
 '.LCRun::wi('good', $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun::enc('../gender', $cx, $in).' , '.LCRun::enc('../../name', $cx, $in).' , '.LCRun::raw('../../end', $cx, $in).'
 ';}).'
';}).'
</ul>
WITH TEST>
'.LCRun::wi('people', $cx, $in, function($cx, $in) {return '
 single: '.LCRun::enc('name', $cx, $in).', '.LCRun::enc('gender', $cx, $in).'
 '.LCRun::sec('', $cx, $in, true, function($cx, $in) {return 'loop: '.LCRun::enc('name', $cx, $in).' - '.LCRun::enc('../name', $cx, $in).' - '.LCRun::enc('../../name', $cx, $in).'';}).'
';}).'
'.LCRun::enc('end', $cx, $in).'
';
}
?>