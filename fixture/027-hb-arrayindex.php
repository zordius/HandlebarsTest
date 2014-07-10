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

##0 start section:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('winners')), $in, false, function($cx, $in) {return '
  - EACH 1- '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).'
';}).'
end section.

##1 start each:
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('winners')), $in, true, function($cx, $in) {return '
  - EACH 2 - '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).'
';}).'
end each.

##3 Index
Index ?: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('winners','name'))).'
Index 0: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('winners','0','name'))).'
Index 1: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('winners','1','name'))).'
';
}
?>