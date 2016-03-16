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
    
    return 'Hello '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).', you have just won $'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).'!
each partial....
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('winners')), null, $in, true, function($cx, $in) {return ''.'  Hello '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).', you have just won $'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).'!
  This is next line.'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('empty_var'))).'中文
  Test \\on \'spacing in mustache: Hello '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).', you have just won $'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).'!
'.'--
'.'  <div class="yui3-u-1-2 member-status">
   <ul class="h-list">
'.LR::wi($cx, LR::v($cx, $in, isset($in) ? $in : null, array('login_status')), null, $in, function($cx, $in) {return ''.((LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('is_login')), false)) ? '     <li><a href="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('edit_account_link'))).'">Hello '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('username'))).'</a></li>
     <li><a href="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('logut_link'))).'">Logout</a></li>
' : '').''.((!LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('is_login')), false)) ? '     <li>New User? <a href="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('register_link'))).'">Register Now</a></li>
     <li><a href="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('login_link'))).'">Login</a></li>
' : '').'';}).'    <li><a>About Auction</a></li>
   </ul>
  </div>
'.'';}).'end each.

if + with + partial:
'.((LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test')), false)) ? 'w>'.LR::wi($cx, LR::v($cx, $in, isset($in) ? $in : null, array('people')), null, $in, function($cx, $in) {return '
  p>'.'Hello '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).', you have just won $'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).'!
This is next line.'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('empty_var'))).'中文
Test \\on \'spacing in mustache: Hello '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).', you have just won $'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).'!
'.'<
<w';}).'
' : '').'';
}; ?>