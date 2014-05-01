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

    );
    return '<div id="yauitqna">
    <table>
        '.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return '
        <tr>
            <td class="first" colspan="2">
            <h4><a name="'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).'"></a>問題 $p</h4>
            '.LCRun3::encq($cx, ((is_array($in) && isset($in['yid'])) ? $in['yid'] : null)).' 暱稱：'.LCRun3::encq($cx, ((is_array($in) && isset($in['userName'])) ? $in['userName'] : null)).' ( '.LCRun3::encq($cx, ((is_array($in) && isset($in['recommend'])) ? $in['recommend'] : null)).' )<p>'.LCRun3::encq($cx, ((is_array($in) && isset($in['comment'])) ? $in['comment'] : null)).'</p>
            </td>
            <td class="asktime">$askTime</td>
        </tr>                               
            '.LCRun3::sec($cx, ((is_array($in) && isset($in['replyer'])) ? $in['replyer'] : null), $in, true, function($cx, $in) {return '
                <tr class="gray">
                    <td class="first" colspan="2">
                        <h4><a name="579997583"></a>答覆</h4>
                        <p><a href="http://tw.user.bid.yahoo.com/tw/user/Y7379251092">EYESCREAM</a>
                        ( <a href="http://tw.user.bid.yahoo.com/tw/show/rating?userID=Y7379251092">56141</a>
                        )</p>
                        <p>Lady您好：'.LCRun3::encq($cx, ((is_array($in) && isset($in['comment'])) ? $in['comment'] : null)).'</p>
                    </td>
                    <td class="asktime">'.LCRun3::encq($cx, ((is_array($in) && isset($in['replyTime'])) ? $in['replyTime'] : null)).'</td>
                </tr>
            ';}).'
        ';}).'
    </table>
</div>
';
}
?>