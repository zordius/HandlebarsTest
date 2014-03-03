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
    return 'Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

. '.LCRun2::encq(Array('!'), $cx, $in).' !!
. KAKA '.LCRun2::encq(Array('! # % & ( ) * + , . / ; < = > @ [ \ ^ ` { | } ~'), $cx, $in).'
. K '.LCRun2::encq(Array('!['), $cx, $in).' X
. Hello '.LCRun2::encq(Array('winners','0','name'), $cx, $in).' !! Won $'.LCRun2::encq(Array('winners','0','value'), $cx, $in).' now~~
. Hello '.LCRun2::encq(Array('winners','1','name'), $cx, $in).' !! Won $'.LCRun2::encq(Array('winners','1','value'), $cx, $in).' later~~
. No '.LCRun2::encq(Array('winners','!','name'), $cx, $in).' !!
';
}
?>