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
    
    return '<ul>
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('people')), null, $in, true, function($cx, $in) {return ' <li>'.LR::encq($cx, LR::v($cx, $in, isset($cx['sp_vars']) ? $cx['sp_vars'] : null, array('index'))).', '.LR::encq($cx, LR::v($cx, $in, isset($cx['sp_vars']) ? $cx['sp_vars'] : null, array('key'))).' : '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).' '.((LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name')), false)) ? '(V)' : '').''.((LR::ifvar($cx, LR::v($cx, $in, isset($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1] : null, array('test')), false)) ? '(Y)' : '').'</li>
';}).'</ul>
';
}; ?>