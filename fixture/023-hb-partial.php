<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
each partial....
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('winners')), $in, true, function($cx, $in) {return '
  Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('empty_var'))).'中文
Test \on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!

--
  <div class="yui3-u-1-2 member-status">
 <ul class="h-list">
 '.LCRun3::wi($cx, LCRun3::v($cx, $in, Array('login_status')), $in, function($cx, $in) {return '
  '.((LCRun3::ifvar($cx, LCRun3::v($cx, $in, Array('is_login')))) ? '
   <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('edit_account_link'))).'">Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('username'))).'</a></li>
   <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('logut_link'))).'">Logout</a></li>
  ' : '').'
  '.((!LCRun3::ifvar($cx, LCRun3::v($cx, $in, Array('is_login')))) ? '
   <li>New User? <a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('register_link'))).'">Register Now</a></li>
   <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('login_link'))).'">Login</a></li>
  ' : '').'
 ';}).'
  <li><a>About Auction</a></li>
 </ul>
</div>

';}).'
end each.

if + with + partial:
'.((LCRun3::ifvar($cx, LCRun3::v($cx, $in, Array('test')))) ? '
w>'.LCRun3::wi($cx, LCRun3::v($cx, $in, Array('people')), $in, function($cx, $in) {return '
  p>Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
This is next line.'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('empty_var'))).'中文
Test \on \'spacing in mustache: Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!
<
<w';}).'
' : '').'
';
}
?>