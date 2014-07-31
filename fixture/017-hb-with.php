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
            'debug' => $debugopt,
        ),
        'helpers' => array(),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array(),

    );
    return '<div class="yui3-u-1-2 member-status">
 <ul class="h-list">
 '.LCRun3::wi($cx, LCRun3::v($cx, $in, array('login_status')), $in, function($cx, $in) {return '
  '.((LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('is_login')))) ? '
   <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('edit_account_link'))).'">Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('username'))).'</a></li>
   <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('logut_link'))).'">Logout</a></li>
  ' : '').'
  '.((!LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('is_login')))) ? '
   <li>New User? <a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('register_link'))).'">Register Now</a></li>
   <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('login_link'))).'">Login</a></li>
  ' : '').'
 ';}).'
  <li><a>About Auction</a></li>
 </ul>
</div>
';
}
?>