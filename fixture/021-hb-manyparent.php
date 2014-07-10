<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
<ul>
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return '
 <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('end'))).')</li>
 simple if~
 '.LCRun3::ifv($cx, LCRun3::v($cx, $in, Array('good')), $in, function($cx, $in) {return '
  simple GOOD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('goodchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' X '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('end'))).'
 ';}).'
 if-else
 '.LCRun3::ifv($cx, LCRun3::v($cx, $in, Array('good')), $in, function($cx, $in) {return '
  GOOD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('goodchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' X '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('end'))).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('badchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' Y '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).' = '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('end'))).'
 ';}).'
 with
 '.LCRun3::wi($cx, LCRun3::v($cx, $in, Array('good')), $in, function($cx, $in) {return '
    WITH: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('gender'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).' , '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('end'))).'
 ';}).'
 simple unless
 '.LCRun3::unl($cx, LCRun3::v($cx, $in, Array('good')), $in, function($cx, $in) {return '
   UNLESS good = bad -> '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).'
 ';}).'
 unless else
 '.LCRun3::unl($cx, LCRun3::v($cx, $in, Array('good')), $in, function($cx, $in) {return '
   UNLESS good = bad -> '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).'
 ';}, function($cx, $in) {return '
   UNLESS bad = good -> '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).'
 ';}).'
';}).'
----------THIS
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return '
 <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('end'))).')</li>
 '.LCRun3::ifv($cx, LCRun3::v($cx, $in, Array('good')), $in, function($cx, $in) {return '
  GOOD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('goodchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' X '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('end'))).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('badchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' Y '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).' = '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('end'))).'
 ';}).'
 '.LCRun3::wi($cx, LCRun3::v($cx, $in, Array('good')), $in, function($cx, $in) {return '
    WITH: '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).' , '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('end'))).'
 ';}).'
';}).'
----------SECTION THIS
'.LCRun3::sec($cx, $in, $in, false, function($cx, $in) {return '
 <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('end'))).')</li>
 '.LCRun3::ifv($cx, LCRun3::v($cx, $in, Array('good')), $in, function($cx, $in) {return '
  GOOD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('goodchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' X '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('end'))).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('badchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' Y '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).' = '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('end'))).'
 ';}).'
 '.LCRun3::wi($cx, LCRun3::v($cx, $in, Array('good')), $in, function($cx, $in) {return '
    WITH: '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).' , '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('end'))).'
 ';}).'
';}).'
----------SECTION .
'.LCRun3::sec($cx, $in, $in, false, function($cx, $in) {return '
 <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('end'))).')</li>
 '.LCRun3::ifv($cx, LCRun3::v($cx, $in, Array('good')), $in, function($cx, $in) {return '
  GOOD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('goodchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' X '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('end'))).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('badchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' Y '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).' = '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('end'))).'
 ';}).'
 '.LCRun3::wi($cx, LCRun3::v($cx, $in, Array('good')), $in, function($cx, $in) {return '
    WITH: '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).' , '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('end'))).'
 ';}).'
';}).'
</ul>
WITH TEST>
'.LCRun3::wi($cx, LCRun3::v($cx, $in, Array('people')), $in, function($cx, $in) {return '
 single: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('gender'))).' , p -> '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).'
 '.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return 'loop: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' - '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).' - '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], Array('name'))).'';}).'
';}).'
'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('end'))).'
';
}
?>