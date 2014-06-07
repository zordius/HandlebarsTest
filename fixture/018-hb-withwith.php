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
    return '<div class="yui3-u-1-2 member-status">
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
~WITH
  '.LCRun3::wi($cx, LCRun3::v($cx, $in, Array('test')), $in, function($cx, $in) {return '
~TEST~
   '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('testval'))).'
   '.LCRun3::raw($cx, LCRun3::v($cx, $in, Array('testval'))).'
~IF~
   '.((LCRun3::ifvar($cx, LCRun3::v($cx, $in, Array('testval')))) ? 'YES' : '').'
   '.((!LCRun3::ifvar($cx, LCRun3::v($cx, $in, Array('testval')))) ? 'NO' : '').'
~SEC~
   '.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('test2')), $in, false, function($cx, $in) {return '
    '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('loopval'))).'
   ';}).'
~EACH~
   '.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('test3')), $in, true, function($cx, $in) {return '
    '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('loopval'))).'
   ';}).'
~END~
  ';}).'
WITH~
 ';}).'
_WITH PATH_
 '.LCRun3::wi($cx, LCRun3::v($cx, $in, Array('login_status','test')), $in, function($cx, $in) {return '
XTEST: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('testval'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $in, Array('textval'))).'
IF: '.((LCRun3::ifvar($cx, LCRun3::v($cx, $in, Array('testval')))) ? 'YES~' : '').''.((!LCRun3::ifvar($cx, LCRun3::v($cx, $in, Array('testval')))) ? 'NO!' : '').'
SECTION::'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('test2')), $in, false, function($cx, $in) {return ' - loop: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('loopval'))).'';}).'
EACH::'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('test3')), $in, true, function($cx, $in) {return '	lp:'.LCRun3::raw($cx, LCRun3::v($cx, $in, Array('loopval'))).'';}).'
END!
 ';}).'
 </ul>
</div>
';
}
?>