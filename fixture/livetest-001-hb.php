<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => false,
            'jsobj' => false
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return '<div id="yauitqna">
    <table>
        '.LightnCandy::sec('.', $cx, $in, true, function($cx, $in) {return '
        <tr>
            <td class="first" colspan="2">
            <h4><a name="'.htmlentities($in['name'], ENT_QUOTES).'"></a>問題 $p</h4>
            '.htmlentities($in['yid'], ENT_QUOTES).' 暱稱：'.htmlentities($in['userName'], ENT_QUOTES).' ( '.htmlentities($in['recommend'], ENT_QUOTES).' )<p>'.htmlentities($in['comment'], ENT_QUOTES).'</p>
            </td>
            <td class="asktime">$askTime</td>
        </tr>                               
            '.LightnCandy::sec('replyer', $cx, $in, true, function($cx, $in) {return '
                <tr class="gray">
                    <td class="first" colspan="2">
                        <h4><a name="579997583"></a>答覆</h4>
                        <p><a href="http://tw.user.bid.yahoo.com/tw/user/Y7379251092">EYESCREAM</a>
                        ( <a href="http://tw.user.bid.yahoo.com/tw/show/rating?userID=Y7379251092">56141</a>
                        )</p>
                        <p>Lady您好：'.htmlentities($in['comment'], ENT_QUOTES).'</p>
                    </td>
                    <td class="asktime">'.htmlentities($in['replyTime'], ENT_QUOTES).'</td>
                </tr>
            ';}).'
        ';}).'
    </table>
</div>
';
}
?>