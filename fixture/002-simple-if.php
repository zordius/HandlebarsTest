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
),
        'scopes' => Array($in),
        'path' => Array(),

    );
    ob_start();echo 'Hello ',LCRun2::encq(Array('name'), $cx, $in),', you have just won $',LCRun2::encq(Array('value'), $cx, $in),'!
This is next line.
',LCRun2::sec(Array('test'), $cx, $in, false, function($cx, $in) {echo '
This is true! won $',LCRun2::encq(Array('value'), $cx, $in),'!!
';}),'
';return ob_get_clean();
}
?>