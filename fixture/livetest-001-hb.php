<?php return function ($in, $debugopt = 1) {
    $cx = array(
        'flags' => array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'mustsec' => false,
            'echo' => false,
            'debug' => $debugopt,
        ),
        'helpers' => array(),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array('root' => $in),

    );
    return '<div id="yauitqna">
    <table>
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return '        <tr>
            <td class="first" colspan="2">
            <h4><a name="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).'"></a>問題 $p</h4>
            '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('yid'))).' 暱稱：'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('userName'))).' ( '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('recommend'))).' )<p>'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('comment'))).'</p>
            </td>
            <td class="asktime">$askTime</td>
        </tr>                               
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('replyer')), $in, true, function($cx, $in) {return '                <tr class="gray">
                    <td class="first" colspan="2">
                        <h4><a name="579997583"></a>答覆</h4>
                        <p><a href="http://tw.user.bid.yahoo.com/tw/user/Y7379251092">EYESCREAM</a>
                        ( <a href="http://tw.user.bid.yahoo.com/tw/show/rating?userID=Y7379251092">56141</a>
                        )</p>
                        <p>Lady您好：'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('comment'))).'</p>
                    </td>
                    <td class="asktime">'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('replyTime'))).'</td>
                </tr>
';}).'';}).'    </table>
</div>
';
}
?>