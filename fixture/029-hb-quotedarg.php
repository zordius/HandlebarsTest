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
        'helpers' => array(            'helper1' => function($args, $named) {
    $u = (isset($args[0])) ? $args[0] : 'undefined';
    $t = (isset($args[1])) ? $args[1] : 'undefined';
    return "<a href=\"{$u}\">{$t}</a>";
},
),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array('root' => $in),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!

. Test 1: '.((LCRun3::ifvar($cx, '')) ? 'OK' : '').' !!
. Test 2: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('test','a b'))).' !!
. Test 3: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('te"st','cd'))).' !!
. Test 4: '.((LCRun3::ifvar($cx, LCRun3::v($cx, $in, array('te"st')))) ? 'OK' : '').' !!
. Test 5: '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),'this is a test & OK'),array()), 'raw').' !!
. Test 6: '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),'this is a test'),array()), 'raw').' !!
. Test 7: '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),'this is a test & OK'),array()), 'encq').' !!
. Test 8: '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),'this is a test'),array()), 'encq').' !!
. Test 9: '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),'this.is.atest'),array()), 'encq').' !!
';
}
?>