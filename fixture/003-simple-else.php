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
This is next line.
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test')), null, $in, false, function($cx, $in) {return 'This is true! won $'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).'!!
';}).''.((LR::isec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('test')))) ? 'No, this is fake! not win $'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('value'))).'!!
' : '').'';
}; ?>