<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return '<div id="yauitqna">
    <table>
        '.LCRun2::sec($in, $cx, $in, true, function($cx, $in) {return '
        <tr>
            <td class="first" colspan="2">
            <h4><a name="'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).'"></a>問題 $p</h4>
            '.LCRun2::encq((is_array($in) ? $in['yid'] : null), $cx).' 暱稱：'.LCRun2::encq((is_array($in) ? $in['userName'] : null), $cx).' ( '.LCRun2::encq((is_array($in) ? $in['recommend'] : null), $cx).' )<p>'.LCRun2::encq((is_array($in) ? $in['comment'] : null), $cx).'</p>
            </td>
            <td class="asktime">$askTime</td>
        </tr>                               
            '.LCRun2::sec((is_array($in) ? $in['replyer'] : null), $cx, $in, true, function($cx, $in) {return '
                <tr class="gray">
                    <td class="first" colspan="2">
                        <h4><a name="579997583"></a>答覆</h4>
                        <p><a href="http://tw.user.bid.yahoo.com/tw/user/Y7379251092">EYESCREAM</a>
                        ( <a href="http://tw.user.bid.yahoo.com/tw/show/rating?userID=Y7379251092">56141</a>
                        )</p>
                        <p>Lady您好：'.LCRun2::encq((is_array($in) ? $in['comment'] : null), $cx).'</p>
                    </td>
                    <td class="asktime">'.LCRun2::encq((is_array($in) ? $in['replyTime'] : null), $cx).'</td>
                </tr>
            ';}).'
        ';}).'
    </table>
</div>
';
}
?>