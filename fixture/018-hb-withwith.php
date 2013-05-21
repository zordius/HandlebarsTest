<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return '<div class="yui3-u-1-2 member-status">
 <ul class="h-list">
 '.LCRun::wi('login_status', $cx, $in, function($cx, $in) {return '
  '.(LCRun::ifvar('is_login', $in) ? ('
   <li><a href="'.LCRun::enc('edit_account_link', $cx, $in).'">Hello '.LCRun::enc('username', $cx, $in).'</a></li>
   <li><a href="'.LCRun::enc('logut_link', $cx, $in).'">Logout</a></li>
  ') : '').'
  '.(!LCRun::ifvar('is_login', $in) ? ('
   <li>New User? <a href="'.LCRun::enc('register_link', $cx, $in).'">Register Now</a></li>
   <li><a href="'.LCRun::enc('login_link', $cx, $in).'">Login</a></li>
  ') : '').'
  '.LCRun::wi('test', $cx, $in, function($cx, $in) {return '
   '.LCRun::enc('testval', $cx, $in).'
   '.LCRun::raw('testval', $cx, $in).'
   '.(LCRun::ifvar('testval', $in) ? ('YES') : '').'
   '.(!LCRun::ifvar('testval', $in) ? ('NO') : '').'
   '.LCRun::sec('test2', $cx, $in, false, function($cx, $in) {return '
    '.LCRun::enc('loopval', $cx, $in).'
   ';}).'
   '.LCRun::sec('test3', $cx, $in, true, function($cx, $in) {return '
    '.LCRun::enc('loopval', $cx, $in).'
   ';}).'
  ';}).'
 ';}).'
 </ul>
</div>
';
}
?>