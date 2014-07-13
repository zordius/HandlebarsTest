<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'partials' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!

. '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('!'))).' !!
. KAKA '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('! # % & ( ) * + , . / ; < = > @ [ \\ ^ ` { | } ~'))).'
. K '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('!['))).' X
. Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('winners','0','name'))).' !! Won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('winners','0','value'))).' now~~
. Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('winners','1','name'))).' !! Won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('winners','1','value'))).' later~~
. No '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('winners','!','name'))).' !!
';
}
?>