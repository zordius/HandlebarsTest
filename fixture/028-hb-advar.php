<?php return function ($in, $debugopt = 1) {
    $cx = array(
        'flags' => array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'mustsec' => false,
            'echo' => false,
            'debug' => $debugopt,
        ),
        'helpers' => array(),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array('root' => $in),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!

. '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('!'))).' !!
. KAKA '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('! # % & ( ) * + , . / ; < = > @ [ \\ ^ ` { | } ~'))).'
. K '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('!['))).' X
. Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('winners','0','name'))).' !! Won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('winners','0','value'))).' now~~
. Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('winners','1','name'))).' !! Won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('winners','1','value'))).' later~~
. No '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('winners','!','name'))).' !!
';
}
?>