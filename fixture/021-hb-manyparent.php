<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(            'helper1' => function($url, $txt) {
                $u = ($url !== null) ? $url : 'undefined';
                $t = ($txt !== null) ? $txt : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>";
            },
),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
<ul>
'.LCRun2::sec(Array(null), $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq(Array('name'), $cx, $in).' is a '.LCRun2::encq(Array('gender'), $cx, $in).' ('.LCRun2::encq(Array(1,'name'), $cx, $in).', '.LCRun2::encq(Array(1,'value'), $cx, $in).', '.LCRun2::encq(Array(1,'end'), $cx, $in).')</li>
 simple if~
 '.((LCRun2::ifvar(Array('good'), $cx, $in)) ? '
  simple GOOD! '.LCRun2::encq(Array('goodchild'), $cx, $in).' '.LCRun2::encq(Array(1,'gender'), $cx, $in).' - '.LCRun2::raw(Array(1,'gender'), $cx, $in).' X '.LCRun2::encq(Array(2,'name'), $cx, $in).' ~ '.LCRun2::encq(Array(2,'end'), $cx, $in).'
 ' : '').'
 if-else
 '.((LCRun2::ifvar(Array('good'), $cx, $in)) ? '
  GOOD! '.LCRun2::encq(Array('goodchild'), $cx, $in).' '.LCRun2::encq(Array(1,'gender'), $cx, $in).' - '.LCRun2::raw(Array(1,'gender'), $cx, $in).' X '.LCRun2::encq(Array(2,'name'), $cx, $in).' ~ '.LCRun2::encq(Array(2,'end'), $cx, $in).'
 ' : '
  BAD! '.LCRun2::encq(Array('badchild'), $cx, $in).' '.LCRun2::encq(Array(1,'gender'), $cx, $in).' - '.LCRun2::raw(Array(1,'gender'), $cx, $in).' Y '.LCRun2::raw(Array(2,'name'), $cx, $in).' = '.LCRun2::raw(Array(2,'end'), $cx, $in).'
 ').'
 with
 '.LCRun2::wi(Array('good'), $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun2::encq(Array('gender'), $cx, $in).', '.LCRun2::encq(Array(1,'gender'), $cx, $in).' , '.LCRun2::encq(Array(2,'name'), $cx, $in).' , '.LCRun2::raw(Array(2,'end'), $cx, $in).'
 ';}).'
 simple unless
 '.((!LCRun2::ifvar(Array('good'), $cx, $in)) ? '
   UNLESS good = bad -> '.LCRun2::encq(Array(1,'gender'), $cx, $in).' , '.LCRun2::encq(Array(2,'name'), $cx, $in).'
 ' : '').'
 unless else
 '.((!LCRun2::ifvar(Array('good'), $cx, $in)) ? '
   UNLESS good = bad -> '.LCRun2::encq(Array(1,'gender'), $cx, $in).' , '.LCRun2::encq(Array(2,'name'), $cx, $in).'
 ' : '
   UNLESS bad = good -> '.LCRun2::encq(Array(1,'gender'), $cx, $in).' , '.LCRun2::encq(Array(2,'name'), $cx, $in).'
 ').'
';}).'
----------THIS
'.LCRun2::sec(Array(null), $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq(Array('name'), $cx, $in).' is a '.LCRun2::encq(Array('gender'), $cx, $in).' ('.LCRun2::encq(Array(1,'name'), $cx, $in).', '.LCRun2::encq(Array(1,'value'), $cx, $in).', '.LCRun2::encq(Array(1,'end'), $cx, $in).')</li>
 '.((LCRun2::ifvar(Array('good'), $cx, $in)) ? '
  GOOD! '.LCRun2::encq(Array('goodchild'), $cx, $in).' '.LCRun2::encq(Array(1,'gender'), $cx, $in).' - '.LCRun2::raw(Array(1,'gender'), $cx, $in).' X '.LCRun2::encq(Array(2,'name'), $cx, $in).' ~ '.LCRun2::encq(Array(2,'end'), $cx, $in).'
 ' : '
  BAD! '.LCRun2::encq(Array('badchild'), $cx, $in).' '.LCRun2::encq(Array(1,'gender'), $cx, $in).' - '.LCRun2::raw(Array(1,'gender'), $cx, $in).' Y '.LCRun2::raw(Array(2,'name'), $cx, $in).' = '.LCRun2::raw(Array(2,'end'), $cx, $in).'
 ').'
 '.LCRun2::wi(Array('good'), $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun2::encq(Array(1,'gender'), $cx, $in).' , '.LCRun2::encq(Array(2,'name'), $cx, $in).' , '.LCRun2::raw(Array(2,'end'), $cx, $in).'
 ';}).'
';}).'
----------SECTION THIS
'.LCRun2::sec(Array(null), $cx, $in, false, function($cx, $in) {return '
 <li>'.LCRun2::encq(Array('name'), $cx, $in).' is a '.LCRun2::encq(Array('gender'), $cx, $in).' ('.LCRun2::encq(Array(1,'name'), $cx, $in).', '.LCRun2::encq(Array(1,'value'), $cx, $in).', '.LCRun2::encq(Array(1,'end'), $cx, $in).')</li>
 '.((LCRun2::ifvar(Array('good'), $cx, $in)) ? '
  GOOD! '.LCRun2::encq(Array('goodchild'), $cx, $in).' '.LCRun2::encq(Array(1,'gender'), $cx, $in).' - '.LCRun2::raw(Array(1,'gender'), $cx, $in).' X '.LCRun2::encq(Array(2,'name'), $cx, $in).' ~ '.LCRun2::encq(Array(2,'end'), $cx, $in).'
 ' : '
  BAD! '.LCRun2::encq(Array('badchild'), $cx, $in).' '.LCRun2::encq(Array(1,'gender'), $cx, $in).' - '.LCRun2::raw(Array(1,'gender'), $cx, $in).' Y '.LCRun2::raw(Array(2,'name'), $cx, $in).' = '.LCRun2::raw(Array(2,'end'), $cx, $in).'
 ').'
 '.LCRun2::wi(Array('good'), $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun2::encq(Array(1,'gender'), $cx, $in).' , '.LCRun2::encq(Array(2,'name'), $cx, $in).' , '.LCRun2::raw(Array(2,'end'), $cx, $in).'
 ';}).'
';}).'
----------SECTION .
'.LCRun2::sec(Array(null), $cx, $in, false, function($cx, $in) {return '
 <li>'.LCRun2::encq(Array('name'), $cx, $in).' is a '.LCRun2::encq(Array('gender'), $cx, $in).' ('.LCRun2::encq(Array(1,'name'), $cx, $in).', '.LCRun2::encq(Array(1,'value'), $cx, $in).', '.LCRun2::encq(Array(1,'end'), $cx, $in).')</li>
 '.((LCRun2::ifvar(Array('good'), $cx, $in)) ? '
  GOOD! '.LCRun2::encq(Array('goodchild'), $cx, $in).' '.LCRun2::encq(Array(1,'gender'), $cx, $in).' - '.LCRun2::raw(Array(1,'gender'), $cx, $in).' X '.LCRun2::encq(Array(2,'name'), $cx, $in).' ~ '.LCRun2::encq(Array(2,'end'), $cx, $in).'
 ' : '
  BAD! '.LCRun2::encq(Array('badchild'), $cx, $in).' '.LCRun2::encq(Array(1,'gender'), $cx, $in).' - '.LCRun2::raw(Array(1,'gender'), $cx, $in).' Y '.LCRun2::raw(Array(2,'name'), $cx, $in).' = '.LCRun2::raw(Array(2,'end'), $cx, $in).'
 ').'
 '.LCRun2::wi(Array('good'), $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun2::encq(Array(1,'gender'), $cx, $in).' , '.LCRun2::encq(Array(2,'name'), $cx, $in).' , '.LCRun2::raw(Array(2,'end'), $cx, $in).'
 ';}).'
';}).'
</ul>
WITH TEST>
'.LCRun2::wi(Array('people'), $cx, $in, function($cx, $in) {return '
 single: '.LCRun2::encq(Array('name'), $cx, $in).', '.LCRun2::encq(Array('gender'), $cx, $in).'
 '.LCRun2::sec(Array(null), $cx, $in, true, function($cx, $in) {return 'loop: '.LCRun2::encq(Array('name'), $cx, $in).' - '.LCRun2::encq(Array(1,'name'), $cx, $in).' - '.LCRun2::encq(Array(2,'name'), $cx, $in).'';}).'
';}).'
'.LCRun2::encq(Array('end'), $cx, $in).'
';
}
?>