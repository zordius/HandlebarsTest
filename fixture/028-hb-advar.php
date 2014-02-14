<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!

. '.LCRun::encq('!', $cx, $in).' !!
. KAKA '.LCRun::encq('! # % & ( ) * + , . / ; < = > @ [ \ ^ ` { | } ~', $cx, $in).'
. K '.LCRun::encq('![', $cx, $in).' X
. Hello '.LCRun::encq('winners]0]name', $cx, $in).' !! Won $'.LCRun::encq('winners]0]value', $cx, $in).' now~~
. Hello '.LCRun::encq('winners]1]name', $cx, $in).' !! Won $'.LCRun::encq('winners]1]value', $cx, $in).' later~~
. No '.LCRun::encq('winners]!]name', $cx, $in).' !!
';
}
?>