<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return '<div id="yauitqna">
    <table>
        '.LightnCandy::sec('', $cx, $in, true, function($cx, $in) {return '
        <tr>
            <td class="first" colspan="2">
            <h4><a name="'.LightnCandy::enc('name', $cx, $in).'"></a>問題 $p</h4>
            '.LightnCandy::enc('yid', $cx, $in).' 暱稱：'.LightnCandy::enc('userName', $cx, $in).' ( '.LightnCandy::enc('recommend', $cx, $in).' )<p>'.LightnCandy::enc('comment', $cx, $in).'</p>
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
                        <p>Lady您好：'.LightnCandy::enc('comment', $cx, $in).'</p>
                    </td>
                    <td class="asktime">'.LightnCandy::enc('replyTime', $cx, $in).'</td>
                </tr>
            ';}).'
        ';}).'
    </table>
</div>
';
}
?>