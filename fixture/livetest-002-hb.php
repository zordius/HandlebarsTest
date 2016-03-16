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
    
    return ''.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('specs')), null, $in, true, function($cx, $in) {return '   <div class="item-spec">
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('options')), null, $in, true, function($cx, $in) {return ''.((LR::ifvar($cx, LR::v($cx, $in, isset($in) ? $in : null, array('icon')), false)) ? '        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LR::encq($cx, LR::v($cx, $in, isset($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1] : null, array('id'))).'-'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('id'))).'" value="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('id'))).'" name="'.LR::encq($cx, LR::v($cx, $in, isset($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1] : null, array('id'))).'" alt="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).'" data-name="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).'"/>
            <label class="spec-label icon" for="spec-'.LR::encq($cx, LR::v($cx, $in, isset($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1] : null, array('id'))).'-'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('id'))).'" style="background-image:url('.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('icon'))).');">
            </label>
        </div>
' : '        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LR::encq($cx, LR::v($cx, $in, isset($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1] : null, array('id'))).'-'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('id'))).'" value="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('id'))).'" name="'.LR::encq($cx, LR::v($cx, $in, isset($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1] : null, array('id'))).'" data-name="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).'"/>
            <label class="spec-label" for="spec-'.LR::encq($cx, LR::v($cx, $in, isset($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1] : null, array('id'))).'-'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('id'))).'">'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).'</label>
        </div>
').'        <script>
            document.getElementById(\'spec-'.LR::encq($cx, LR::v($cx, $in, isset($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1] : null, array('id'))).'-'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('id'))).'\').className += \'hidden\';
        </script>
';}).'    </div>
';}).'';
}; ?>