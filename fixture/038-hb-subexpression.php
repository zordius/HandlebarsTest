<?php use \LightnCandy\Runtime as LR;return function ($in = null, $options = null) {
    $helpers = array(            'helper1' => function($arg0 = null, $arg1 = null) {
        $u = ($arg0 !== null) ? $arg0 : 'undefined';
        $t = ($arg1 !== null) ? $arg1 : 'undefined';
        return "<a href=\"{$u}\">{$t}</a>";
    },
);
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
    
    return ''.LR::raw($cx, LR::hbch($cx, 'helper1', array(array(LR::v($cx, $in, isset($in) ? $in : null, array('url')),LR::hbch($cx, 'helper1', array(array(LR::v($cx, $in, isset($in) ? $in : null, array('url2')),LR::v($cx, $in, isset($in) ? $in : null, array('text'))),array()), 'raw', $in)),array()), 'raw', $in)).'

';
}; ?>