<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(            'helper1' => function($url, $txt) {
                $u = ($url !== null) ? $url : 'undefined';
                $t = ($txt !== null) ? $txt : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>";
            },
            'helper2' => function($hash) {
                $u = isset($hash['url']) ? $hash['url'] : 'undefined';
                $t = isset($hash['text']) ? $hash['text'] : 'undefined';
                $x = isset($hash['ur"l']) ? $hash['ur"l'] : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>({$x})";
            },
),
        'blockhelpers' => Array(            'helper3' => function($cx, $args) {
                return Array('test1', 'test2', 'test3');
            },
            'helper4' => function($cx, $args) {
                if (isset($args['val']) && is_array($cx)) {
                    $cx['helper4_value'] = $args['val'] % 2;
                    return $cx;
                }
                if (isset($args['odd'])) {
                    return Array(1,3,5,7,9);
                }
            },
),
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