<?php return function ($in, $debugopt = 1) {
    $cx = array(
        'flags' => array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'mustsec' => false,
            'debug' => $debugopt,
        ),
        'helpers' => array(),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!

##0 start section:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('winners')), $in, false, function($cx, $in) {return '
  - EACH 1 - '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).'
  '.'Name:'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', Value:'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('test'))).'
'.'
  - EACH 2- '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).'
';}).'
end section.

##1 start each:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('winners')), $in, true, function($cx, $in) {return '
  - EACH 3 - '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).'
  '.'Name:'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', Value:'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('test'))).'
'.'
  - EACH 4 - '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).'
';}).'
end each.

##2 start each+if:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('winners')), $in, true, function($cx, $in) {return '
 '.LCRun3::ifv($cx, LCRun3::v($cx, $in, array('test')), $in, function($cx, $in) {return '
  '.'Name:'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', Value:'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('test'))).'
'.'
 ';}).'
';}).'
end each+if.

##3 start each+if+with:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('winners')), $in, true, function($cx, $in) {return '
 '.LCRun3::ifv($cx, LCRun3::v($cx, $in, array('test')), $in, function($cx, $in) {return '
  '.LCRun3::wi($cx, LCRun3::v($cx, $in, array('people')), $in, function($cx, $in) {return '
   '.'Name:'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', Value:'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('test'))).'
'.'
  ';}).'
 ';}).'
';}).'
end each+if+with.

##4 start each+with+if:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('winners')), $in, true, function($cx, $in) {return '
 '.LCRun3::wi($cx, LCRun3::v($cx, $in, array('people')), $in, function($cx, $in) {return '
  '.LCRun3::ifv($cx, LCRun3::v($cx, $in, array('test')), $in, function($cx, $in) {return '
   '.'Name:'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', Value:'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).', This: '.LCRun3::encq($cx, $in).', Test: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('test'))).'
'.'
  ';}).'
 ';}).'
';}).'
end each+with+if.
';
}
?>