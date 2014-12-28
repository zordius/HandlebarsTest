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
            'echo' => false,
            'debug' => $debugopt,
        ),
        'constants' => array(),
        'helpers' => array(),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array('root' => $in),

    );
    
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
include this:
'.'    Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
    This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('empty_var'))).'中文
    Test \\on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
'.'end include.
section partial....
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('winners')), $in, false, function($cx, $in) {return ''.'  Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
  This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('empty_var'))).'中文
  Test \\on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
'.'';}).'end section.

Winners: '.LCRun3::sec($cx, LCRun3::v($cx, $in, array('winners')), $in, false, function($cx, $in) {return ''.LCRun3::encq($cx, $in).'('.LCRun3::raw($cx, $in).') = '.LCRun3::encq($cx, $in).'('.LCRun3::raw($cx, $in).')';}).'

Partial1:'.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('empty_var'))).'中文
Test \\on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
'.'
Partial2:'.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('empty_var'))).'中文
Test \\on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
'.'
Partial3:'.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('empty_var'))).'中文
Test \\on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
'.'
Partial4:'.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('empty_var'))).'中文
Test \\on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
'.'
Partial5:'.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('empty_var'))).'中文
Test \\on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
'.'
Partial6:'.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('empty_var'))).'中文
Test \\on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
'.'
';
}
?>