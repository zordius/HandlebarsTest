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
    
    return '<h1>'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('header'))).'</h1>
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('notEmpty')), null, $in, false, function($cx, $in) {return '<ul>
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('item')), null, $in, false, function($cx, $in) {return ''.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('current')), null, $in, false, function($cx, $in) {return '    <li><strong>'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).'</strong></li>
';}).''.((LR::isec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('current')))) ? '    <li><a href="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('url'))).'">'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).'</a></li>
' : '').'';}).'</ul>
';}).''.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('isEmpty')), null, $in, false, function($cx, $in) {return '<p>The list is empty.</p>
';}).'';
}; ?>