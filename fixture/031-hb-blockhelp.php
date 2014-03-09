<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
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
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'!

. Test 1: '.LCRun2::bch('helper3', Array((is_array($in) ? $in['people'] : null)), $cx, $in, function($cx, $in) {return '<li>'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' -> '.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'</li>';}).'

. Test 2: '.LCRun2::bch('helper4', Array('people'), $cx, $in, function($cx, $in) {return '
  <li>'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' -> '.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'</li>
';}).'

. Test 3: '.LCRun2::sec((is_array($in) ? $in['people'] : null), $cx, $in, true, function($cx, $in) {return '
  NOTE A: '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' : '.LCRun2::encq($in, $cx).' != '.LCRun2::encq($cx['scopes'][count($cx['scopes'])-1], $cx).'
S~'.LCRun2::encq($in, $cx).'~'.LCRun2::bch('helper3', Array(), $cx, $in, function($cx, $in) {return '
  NOTE B: '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' : '.LCRun2::encq($in, $cx).' != '.LCRun2::encq($cx['scopes'][count($cx['scopes'])-1], $cx).'
';}).'E
';}).'

. Test 4: '.LCRun2::bch('helper3', Array(), $cx, $in, function($cx, $in) {return 'ABC';}).'

. Test 5: '.LCRun2::bch('helper4', Array('val'=>'123','odd'=>'1'), $cx, $in, function($cx, $in) {return '~~~'.LCRun2::encq($in, $cx).'~~~';}).'

. Test 6: '.LCRun2::bch('helper4', Array('val'=>(is_array($in) ? $in['people'] : null),'odd'=>(is_array($in) ? $in['test'] : null)), $cx, $in, function($cx, $in) {return 'TRY~~~'.LCRun2::encq($in, $cx).' , '.LCRun2::encq($cx['scopes'][count($cx['scopes'])-1], $cx).' ~~~';}).'

. Test 7: '.LCRun2::sec((is_array($in) ? $in['people'] : null), $cx, $in, true, function($cx, $in) {return ' 
 OK! 1 '.LCRun2::bch('helper3', Array('val'=>(is_array($in) ? $in['name'] : null),'odd'=>(is_array($in) ? $in['value'] : null)), $cx, $in, function($cx, $in) {return 'TRY ?!??!!~~~'.LCRun2::encq($in, $cx).' , '.LCRun2::encq($cx['scopes'][count($cx['scopes'])-1], $cx).' ~~~';}).'
 OK! '.LCRun2::bch('helper4', Array('val'=>(is_array($in) ? $in['name'] : null),'odd'=>(is_array($in) ? $in['value'] : null)), $cx, $in, function($cx, $in) {return 'TRY ?!~~~'.LCRun2::encq($in, $cx).' , '.LCRun2::encq($cx['scopes'][count($cx['scopes'])-1], $cx).' ~~~';}).'
';}).'
';
}
?>