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
        'helpers' => array(),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array('root' => $in),

    );
    return '<div class="yui3-u-1-2 member-status">
 <ul class="h-list">
'.LCRun3::wi($cx, LCRun3::v($cx, $in, array('login_status')), $in, function($cx, $in) {return ''.((LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('is_login')))) ? '   <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('edit_account_link'))).'">Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('username'))).'</a></li>
   <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('logut_link'))).'">Logout</a></li>
' : '').''.((!LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('is_login')))) ? '   <li>New User? <a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('register_link'))).'">Register Now</a></li>
   <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('login_link'))).'">Login</a></li>
' : '').'~WITH
'.LCRun3::wi($cx, LCRun3::v($cx, $in, array('test')), $in, function($cx, $in) {return '~TEST~
   '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('testval'))).'
   '.LCRun3::raw($cx, LCRun3::v($cx, $in, array('testval'))).'
~IF~
   '.((LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('testval')))) ? 'YES' : '').'
   '.((!LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('testval')))) ? 'NO' : '').'
~SEC~
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('test2')), $in, false, function($cx, $in) {return '    '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('loopval'))).'
';}).'~EACH~
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('test3')), $in, true, function($cx, $in) {return '    '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('loopval'))).'
';}).'~END~
';}).'WITH~
';}).'_WITH PATH_
'.LCRun3::wi($cx, LCRun3::v($cx, $in, array('login_status','test')), $in, function($cx, $in) {return 'XTEST: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('testval'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $in, array('textval'))).'
IF: '.((LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('testval')))) ? 'YES~' : '').''.((!LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('testval')))) ? 'NO!' : '').'
SECTION::'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('test2')), $in, false, function($cx, $in) {return ' - loop: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('loopval'))).'';}).'
EACH::'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('test3')), $in, true, function($cx, $in) {return '	lp:'.LCRun3::raw($cx, LCRun3::v($cx, $in, array('loopval'))).'';}).'
END!
';}).' </ul>
</div>
';
}
?>