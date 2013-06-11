<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return '<div class="yui3-u-1-2 member-status">
 <ul class="h-list">
 '.LCRun::wi('login_status', $cx, $in, function($cx, $in) {return '
  '.(LCRun::ifvar('is_login', $cx, $in) ? ('
   <li><a href="'.LCRun::enc('edit_account_link', $cx, $in).'">Hello '.LCRun::enc('username', $cx, $in).'</a></li>
   <li><a href="'.LCRun::enc('logut_link', $cx, $in).'">Logout</a></li>
  ') : '').'
  '.(!LCRun::ifvar('is_login', $cx, $in) ? ('
   <li>New User? <a href="'.LCRun::enc('register_link', $cx, $in).'">Register Now</a></li>
   <li><a href="'.LCRun::enc('login_link', $cx, $in).'">Login</a></li>
  ') : '').'
~WITH
  '.LCRun::wi('test', $cx, $in, function($cx, $in) {return '
~TEST~
   '.LCRun::enc('testval', $cx, $in).'
   '.LCRun::raw('testval', $cx, $in).'
~IF~
   '.(LCRun::ifvar('testval', $cx, $in) ? ('YES') : '').'
   '.(!LCRun::ifvar('testval', $cx, $in) ? ('NO') : '').'
~SEC~
   '.LCRun::sec('test2', $cx, $in, false, function($cx, $in) {return '
    '.LCRun::enc('loopval', $cx, $in).'
   ';}).'
~EACH~
   '.LCRun::sec('test3', $cx, $in, true, function($cx, $in) {return '
    '.LCRun::enc('loopval', $cx, $in).'
   ';}).'
~END~
  ';}).'
WITH~
 ';}).'
_WITH PATH_
 '.LCRun::wi('login_status.test', $cx, $in, function($cx, $in) {return '
XTEST: '.LCRun::enc('testval', $cx, $in).' - '.LCRun::raw('textval', $cx, $in).'
IF: '.(LCRun::ifvar('testval', $cx, $in) ? ('YES~') : '').''.(!LCRun::ifvar('testval', $cx, $in) ? ('NO!') : '').'
SECTION::'.LCRun::sec('test2', $cx, $in, false, function($cx, $in) {return ' - loop: '.LCRun::enc('loopval', $cx, $in).'';}).'
EACH::'.LCRun::sec('test3', $cx, $in, true, function($cx, $in) {return '	lp:'.LCRun::raw('loopval', $cx, $in).'';}).'
END!
 ';}).'
 </ul>
</div>
';
}
?>