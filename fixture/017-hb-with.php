<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return '<div class="yui3-u-1-2 member-status">
 <ul class="h-list">
 '.LCRun3::wi($cx, ((is_array($in) && isset($in['login_status'])) ? $in['login_status'] : null), $in, function($cx, $in) {return '
  '.((LCRun3::ifvar($cx, ((is_array($in) && isset($in['is_login'])) ? $in['is_login'] : null))) ? '
   <li><a href="'.LCRun3::encq($cx, ((is_array($in) && isset($in['edit_account_link'])) ? $in['edit_account_link'] : null)).'">Hello '.LCRun3::encq($cx, ((is_array($in) && isset($in['username'])) ? $in['username'] : null)).'</a></li>
   <li><a href="'.LCRun3::encq($cx, ((is_array($in) && isset($in['logut_link'])) ? $in['logut_link'] : null)).'">Logout</a></li>
  ' : '').'
  '.((!LCRun3::ifvar($cx, ((is_array($in) && isset($in['is_login'])) ? $in['is_login'] : null))) ? '
   <li>New User? <a href="'.LCRun3::encq($cx, ((is_array($in) && isset($in['register_link'])) ? $in['register_link'] : null)).'">Register Now</a></li>
   <li><a href="'.LCRun3::encq($cx, ((is_array($in) && isset($in['login_link'])) ? $in['login_link'] : null)).'">Login</a></li>
  ' : '').'
 ';}).'
  <li><a>About Auction</a></li>
 </ul>
</div>
';
}
?>