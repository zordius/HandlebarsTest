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
  '.((LCRun::ifvar('is_login', $cx, $in)) ? '
   <li><a href="'.LCRun::enc('edit_account_link', $cx, $in).'">Hello '.LCRun::enc('username', $cx, $in).'</a></li>
   <li><a href="'.LCRun::enc('logut_link', $cx, $in).'">Logout</a></li>
  ' : '').'
  '.((!LCRun::ifvar('is_login', $cx, $in)) ? '
   <li>New User? <a href="'.LCRun::enc('register_link', $cx, $in).'">Register Now</a></li>
   <li><a href="'.LCRun::enc('login_link', $cx, $in).'">Login</a></li>
  ' : '').'
 ';}).'
  <li><a>About Auction</a></li>
 </ul>
</div>
';
}
?>