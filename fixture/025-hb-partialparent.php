<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'mustsec' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'partials' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!

##0 start section:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('winners')), $in, false, function($cx, $in) {return '
  - EACH 1 - '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).'
  '.'Name:'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', Value:'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('test'))).'
'.'
  - EACH 2- '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).'
';}).'
end section.

##1 start each:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('winners')), $in, true, function($cx, $in) {return '
  - EACH 3 - '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).'
  '.'Name:'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', Value:'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('test'))).'
'.'
  - EACH 4 - '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('name'))).'
';}).'
end each.

##2 start each+if:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('winners')), $in, true, function($cx, $in) {return '
 '.LCRun3::ifv($cx, LCRun3::v($cx, $in, Array('test')), $in, function($cx, $in) {return '
  '.'Name:'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', Value:'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('test'))).'
'.'
 ';}).'
';}).'
end each+if.

##3 start each+if+with:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('winners')), $in, true, function($cx, $in) {return '
 '.LCRun3::ifv($cx, LCRun3::v($cx, $in, Array('test')), $in, function($cx, $in) {return '
  '.LCRun3::wi($cx, LCRun3::v($cx, $in, Array('people')), $in, function($cx, $in) {return '
   '.'Name:'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', Value:'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('test'))).'
'.'
  ';}).'
 ';}).'
';}).'
end each+if+with.

##4 start each+with+if:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('winners')), $in, true, function($cx, $in) {return '
 '.LCRun3::wi($cx, LCRun3::v($cx, $in, Array('people')), $in, function($cx, $in) {return '
  '.LCRun3::ifv($cx, LCRun3::v($cx, $in, Array('test')), $in, function($cx, $in) {return '
   '.'Name:'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', Value:'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('test'))).'
'.'
  ';}).'
 ';}).'
';}).'
end each+with+if.
';
}
?>