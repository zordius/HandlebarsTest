<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return '<div id="yauitqna">
    <table>
        '.LCRun::sec('', $cx, $in, true, function($cx, $in) {return '
        <tr>
            <td class="first" colspan="2">
            <h4><a name="'.LCRun::encq('name', $cx, $in).'"></a>問題 $p</h4>
            '.LCRun::encq('yid', $cx, $in).' 暱稱：'.LCRun::encq('userName', $cx, $in).' ( '.LCRun::encq('recommend', $cx, $in).' )<p>'.LCRun::encq('comment', $cx, $in).'</p>
            </td>
            <td class="asktime">$askTime</td>
        </tr>                               
            '.LCRun::sec('replyer', $cx, $in, true, function($cx, $in) {return '
                <tr class="gray">
                    <td class="first" colspan="2">
                        <h4><a name="579997583"></a>答覆</h4>
                        <p><a href="http://tw.user.bid.yahoo.com/tw/user/Y7379251092">EYESCREAM</a>
                        ( <a href="http://tw.user.bid.yahoo.com/tw/show/rating?userID=Y7379251092">56141</a>
                        )</p>
                        <p>Lady您好：'.LCRun::encq('comment', $cx, $in).'</p>
                    </td>
                    <td class="asktime">'.LCRun::encq('replyTime', $cx, $in).'</td>
                </tr>
            ';}).'
        ';}).'
    </table>
</div>
';
}
?>