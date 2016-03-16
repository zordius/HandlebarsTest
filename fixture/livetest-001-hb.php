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
    
    return '<div id="yauitqna">
    <table>
'.LR::sec($cx, $in, null, $in, true, function($cx, $in) {return '        <tr>
            <td class="first" colspan="2">
            <h4><a name="'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('name'))).'"></a>問題 $p</h4>
            '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('yid'))).' 暱稱：'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('userName'))).' ( '.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('recommend'))).' )<p>'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('comment'))).'</p>
            </td>
            <td class="asktime">$askTime</td>
        </tr>                               
'.LR::sec($cx, LR::v($cx, $in, isset($in) ? $in : null, array('replyer')), null, $in, true, function($cx, $in) {return '                <tr class="gray">
                    <td class="first" colspan="2">
                        <h4><a name="579997583"></a>答覆</h4>
                        <p><a href="http://tw.user.bid.yahoo.com/tw/user/Y7379251092">EYESCREAM</a>
                        ( <a href="http://tw.user.bid.yahoo.com/tw/show/rating?userID=Y7379251092">56141</a>
                        )</p>
                        <p>Lady您好：'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('comment'))).'</p>
                    </td>
                    <td class="asktime">'.LR::encq($cx, LR::v($cx, $in, isset($in) ? $in : null, array('replyTime'))).'</td>
                </tr>
';}).'';}).'    </table>
</div>
';
}; ?>