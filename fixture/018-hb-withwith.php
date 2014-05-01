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
        'path' => Array(),

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
~WITH
  '.LCRun3::wi($cx, ((is_array($in) && isset($in['test'])) ? $in['test'] : null), $in, function($cx, $in) {return '
~TEST~
   '.LCRun3::encq($cx, ((is_array($in) && isset($in['testval'])) ? $in['testval'] : null)).'
   '.LCRun3::raw($cx, ((is_array($in) && isset($in['testval'])) ? $in['testval'] : null)).'
~IF~
   '.((LCRun3::ifvar($cx, ((is_array($in) && isset($in['testval'])) ? $in['testval'] : null))) ? 'YES' : '').'
   '.((!LCRun3::ifvar($cx, ((is_array($in) && isset($in['testval'])) ? $in['testval'] : null))) ? 'NO' : '').'
~SEC~
   '.LCRun3::sec($cx, ((is_array($in) && isset($in['test2'])) ? $in['test2'] : null), $in, false, function($cx, $in) {return '
    '.LCRun3::encq($cx, ((is_array($in) && isset($in['loopval'])) ? $in['loopval'] : null)).'
   ';}).'
~EACH~
   '.LCRun3::sec($cx, ((is_array($in) && isset($in['test3'])) ? $in['test3'] : null), $in, true, function($cx, $in) {return '
    '.LCRun3::encq($cx, ((is_array($in) && isset($in['loopval'])) ? $in['loopval'] : null)).'
   ';}).'
~END~
  ';}).'
WITH~
 ';}).'
_WITH PATH_
 '.LCRun3::wi($cx, ((is_array($in['login_status']) && isset($in['login_status']['test'])) ? $in['login_status']['test'] : null), $in, function($cx, $in) {return '
XTEST: '.LCRun3::encq($cx, ((is_array($in) && isset($in['testval'])) ? $in['testval'] : null)).' - '.LCRun3::raw($cx, ((is_array($in) && isset($in['textval'])) ? $in['textval'] : null)).'
IF: '.((LCRun3::ifvar($cx, ((is_array($in) && isset($in['testval'])) ? $in['testval'] : null))) ? 'YES~' : '').''.((!LCRun3::ifvar($cx, ((is_array($in) && isset($in['testval'])) ? $in['testval'] : null))) ? 'NO!' : '').'
SECTION::'.LCRun3::sec($cx, ((is_array($in) && isset($in['test2'])) ? $in['test2'] : null), $in, false, function($cx, $in) {return ' - loop: '.LCRun3::encq($cx, ((is_array($in) && isset($in['loopval'])) ? $in['loopval'] : null)).'';}).'
EACH::'.LCRun3::sec($cx, ((is_array($in) && isset($in['test3'])) ? $in['test3'] : null), $in, true, function($cx, $in) {return '	lp:'.LCRun3::raw($cx, ((is_array($in) && isset($in['loopval'])) ? $in['loopval'] : null)).'';}).'
END!
 ';}).'
 </ul>
</div>
';
}
?>