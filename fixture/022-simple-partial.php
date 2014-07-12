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
        'partials' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
include this:
    '.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('empty_var'))).'中文
Test \on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
'.'
end include.
section partial....
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('winners')), $in, false, function($cx, $in) {return '
  '.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('empty_var'))).'中文
Test \on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
'.'
';}).'
end section.

Winners: '.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('winners')), $in, false, function($cx, $in) {return ''.LCRun3::encq($cx, $in).'('.LCRun3::raw($cx, $in).') = '.LCRun3::encq($cx, $in).'('.LCRun3::raw($cx, $in).')';}).'

Partial1:'.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('empty_var'))).'中文
Test \on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
'.'
Partial2:'.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('empty_var'))).'中文
Test \on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
'.'
Partial3:'.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('empty_var'))).'中文
Test \on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
'.'
Partial4:'.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('empty_var'))).'中文
Test \on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
'.'
Partial5:'.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('empty_var'))).'中文
Test \on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
'.'
Partial6:'.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('empty_var'))).'中文
Test \on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
'.'
';
}
?>