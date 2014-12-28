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
each partial....
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('winners')), $in, true, function($cx, $in) {return ''.'  Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
  This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('empty_var'))).'中文
  Test \\on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
'.'--
'.'  <div class="yui3-u-1-2 member-status">
   <ul class="h-list">
'.LCRun3::wi($cx, LCRun3::v($cx, $in, array('login_status')), $in, function($cx, $in) {return ''.((LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('is_login')))) ? '     <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('edit_account_link'))).'">Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('username'))).'</a></li>
     <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('logut_link'))).'">Logout</a></li>
' : '').''.((!LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('is_login')))) ? '     <li>New User? <a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('register_link'))).'">Register Now</a></li>
     <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('login_link'))).'">Login</a></li>
' : '').'';}).'    <li><a>About Auction</a></li>
   </ul>
  </div>
'.'';}).'end each.

if + with + partial:
'.((LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('test')))) ? 'w>'.LCRun3::wi($cx, LCRun3::v($cx, $in, array('people')), $in, function($cx, $in) {return '
  p>'.'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('empty_var'))).'中文
Test \\on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
'.'<
<w';}).'
' : '').'';
}
?>