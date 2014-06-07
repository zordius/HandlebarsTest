<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
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
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!

. Test 1: '.LCRun3::bch($cx, 'helper3', Array(LCRun3::v($cx, $in, Array('people'))), $in, function($cx, $in) {return '<li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' -> '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'</li>';}).'

. Test 2: '.LCRun3::bch($cx, 'helper4', Array('people'), $in, function($cx, $in) {return '
  <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' -> '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'</li>
';}).'

. Test 3: '.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('people')), $in, true, function($cx, $in) {return '
  NOTE A: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' : '.LCRun3::encq($cx, $in).' != '.LCRun3::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).'
S~'.LCRun3::encq($cx, $in).'~'.LCRun3::bch($cx, 'helper3', Array(), $in, function($cx, $in) {return '
  NOTE B: '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).' : '.LCRun3::encq($cx, $in).' != '.LCRun3::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).'
';}).'E
';}).'

. Test 4: '.LCRun3::bch($cx, 'helper3', Array(), $in, function($cx, $in) {return 'ABC';}).'

. Test 5: '.LCRun3::bch($cx, 'helper4', Array('val'=>'123','odd'=>'1'), $in, function($cx, $in) {return '~~~'.LCRun3::encq($cx, $in).'~~~';}).'

. Test 6: '.LCRun3::bch($cx, 'helper4', Array('val'=>LCRun3::v($cx, $in, Array('people')),'odd'=>LCRun3::v($cx, $in, Array('test'))), $in, function($cx, $in) {return 'TRY~~~'.LCRun3::encq($cx, $in).' , '.LCRun3::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).' ~~~';}).'

. Test 7: '.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('people')), $in, true, function($cx, $in) {return ' 
 OK! 1 '.LCRun3::bch($cx, 'helper3', Array('val'=>LCRun3::v($cx, $in, Array('name')),'odd'=>LCRun3::v($cx, $in, Array('value'))), $in, function($cx, $in) {return 'TRY ?!??!!~~~'.LCRun3::encq($cx, $in).' , '.LCRun3::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).' ~~~';}).'
 OK! '.LCRun3::bch($cx, 'helper4', Array('val'=>LCRun3::v($cx, $in, Array('name')),'odd'=>LCRun3::v($cx, $in, Array('value'))), $in, function($cx, $in) {return 'TRY ?!~~~'.LCRun3::encq($cx, $in).' , '.LCRun3::encq($cx, $cx['scopes'][count($cx['scopes'])-1]).' ~~~';}).'
';}).'
';
}
?>