<?php use \LightnCandy\SafeString as SafeString;use \LightnCandy\Runtime as LR;return function ($in = null, $options = null) {
    $helpers = array();
    $partials = array();
    $cx = array(
        'flags' => array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'lambda' => false,
            'mustlok' => false,
            'mustlam' => false,
            'echo' => false,
            'partnc' => false,
            'knohlp' => false,
            'debug' => isset($options['debug']) ? $options['debug'] : 1,
        ),
        'constants' => array(),
        'helpers' => isset($options['helpers']) ? array_merge($helpers, $options['helpers']) : $helpers,
        'partials' => isset($options['partials']) ? array_merge($partials, $options['partials']) : $partials,
        'scopes' => array(),
        'sp_vars' => isset($options['data']) ? array_merge(array('root' => $in), $options['data']) : array('root' => $in),
        'blparam' => array(),
        'partialid' => 0,
        'runtime' => '\LightnCandy\Runtime',
    );
    
    return '<div class="yui3-u-1-2 member-status">
 <ul class="h-list">
'.LR::wi($cx, LR::v($cx, $in, isset($in) ? $in : null, array('login_status')), null, $in, function($cx, $in) {return ''.((LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('is_login')), false)) ? '   <li><a href="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('edit_account_link'))).'">Hello '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('username'))).'</a></li>
   <li><a href="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('logut_link'))).'">Logout</a></li>
' : '').''.((!LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('is_login')), false)) ? '   <li>New User? <a href="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('register_link'))).'">Register Now</a></li>
   <li><a href="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('login_link'))).'">Login</a></li>
' : '').'~WITH
'.LR::wi($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test')), null, $in, function($cx, $in) {return '~TEST~
   '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('testval'))).'
   '.LR::raw($cx, LR::v($cx, $in, isset($in) ? $in : null, array('testval'))).'
~IF~
   '.((LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('testval')), false)) ? 'YES' : '').'
   '.((!LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('testval')), false)) ? 'NO' : '').'
~SEC~
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test2')), null, $in, false, function($cx, $in) {return '    '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('loopval'))).'
';}).'~EACH~
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test3')), null, $in, true, function($cx, $in) {return '    '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('loopval'))).'
';}).'~END~
';}).'WITH~
';}).'_WITH PATH_
'.LR::wi($cx, LR::v($cx, $in, isset($in) ? $in : null, array('login_status','test')), null, $in, function($cx, $in) {return 'XTEST: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('testval'))).' - '.LR::raw($cx, LR::v($cx, $in, isset($in) ? $in : null, array('textval'))).'
IF: '.((LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('testval')), false)) ? 'YES~' : '').''.((!LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('testval')), false)) ? 'NO!' : '').'
SECTION::'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test2')), null, $in, false, function($cx, $in) {return ' - loop: '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('loopval'))).'';}).'
EACH::'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test3')), null, $in, true, function($cx, $in) {return '	lp:'.LR::raw($cx, LR::v($cx, $in, isset($in) ? $in : null, array('loopval'))).'';}).'
END!
';}).' </ul>
</div>
';
}; ?>