<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!

. '.LCRun::enc('[!]', $cx, $in).' !!
. KAKA '.LCRun::enc('[! # % & ( ) * + , . / ; < = > @ [ \ ^ ` { | } ~]', $cx, $in).'
. K '.LCRun::enc('[![]', $cx, $in).' X
. Hello '.LCRun::enc('winners.0.name', $cx, $in).' !! Won $'.LCRun::enc('winners.0.value', $cx, $in).' now~~
. Hello '.LCRun::enc('winners.1.name', $cx, $in).' !! Won $'.LCRun::enc('winners.1.value', $cx, $in).' later~~
. No '.LCRun::enc('winners.[!].name', $cx, $in).' !!
';
}
?>