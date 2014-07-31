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
            'debug' => $debugopt,
        ),
        'helpers' => array(),
        'blockhelpers' => array(            'helper3' => function($cx, $args, $named) {
    return Array('test1', 'test2', 'test3');
},
            'helper4' => function($cx, $args, $named) {
    if (isset($named['val']) && is_array($cx)) {
        $cx['helper4_value'] = $named['val'] % 2;
        return $cx;
    }
    if (isset($named['odd'])) {
        return Array(1,3,5,7,9);
    }
},
),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!

. Test 1: '.LCRun3::bch($cx, 'helper3', array(array(LCRun3::v($cx, $in, array('people'))),array()), $in, function($cx, $in) {return '<li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' -> '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'</li>';}).'

. Test 2: '.LCRun3::bch($cx, 'helper4', array(array('people'),array()), $in, function($cx, $in) {return '
  <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' -> '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'</li>
';}).'

. Test 3: '.LCRun3::sec($cx, LCRun3::v($cx, $in, array('people')), $in, true, function($cx, $in) {return '
  NOTE A: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' : '.LCRun3::encq($cx, $in).' != '.LCRun3::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).'
S~'.LCRun3::encq($cx, $in).'~'.LCRun3::bch($cx, 'helper3', array(array(),array()), $in, function($cx, $in) {return '
  NOTE B: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' : '.LCRun3::encq($cx, $in).' != '.LCRun3::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).'
';}).'E
';}).'

. Test 4: '.LCRun3::bch($cx, 'helper3', array(array(),array()), $in, function($cx, $in) {return 'ABC';}).'

. Test 5: '.LCRun3::bch($cx, 'helper4', array(array(),array('val'=>'123','odd'=>'1')), $in, function($cx, $in) {return '~~~'.LCRun3::encq($cx, $in).'~~~';}).'

. Test 6: '.LCRun3::bch($cx, 'helper4', array(array(),array('val'=>LCRun3::v($cx, $in, array('people')),'odd'=>LCRun3::v($cx, $in, array('test')))), $in, function($cx, $in) {return 'TRY~~~'.LCRun3::encq($cx, $in).' , '.LCRun3::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).' ~~~';}).'

. Test 7: '.LCRun3::sec($cx, LCRun3::v($cx, $in, array('people')), $in, true, function($cx, $in) {return ' 
 OK! 1 '.LCRun3::bch($cx, 'helper3', array(array(),array('val'=>LCRun3::v($cx, $in, array('name')),'odd'=>LCRun3::v($cx, $in, array('value')))), $in, function($cx, $in) {return 'TRY ?!??!!~~~'.LCRun3::encq($cx, $in).' , '.LCRun3::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).' ~~~';}).'
 OK! '.LCRun3::bch($cx, 'helper4', array(array(),array('val'=>LCRun3::v($cx, $in, array('name')),'odd'=>LCRun3::v($cx, $in, array('value')))), $in, function($cx, $in) {return 'TRY ?!~~~'.LCRun3::encq($cx, $in).' , '.LCRun3::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).' ~~~';}).'
';}).'
';
}
?>