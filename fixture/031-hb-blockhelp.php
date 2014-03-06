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
            'helper2' => function($hash) {
                $u = isset($hash['url']) ? $hash['url'] : 'undefined';
                $t = isset($hash['text']) ? $hash['text'] : 'undefined';
                $x = isset($hash['ur"l']) ? $hash['ur"l'] : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>({$x})";
            },
),
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
    return 'Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

. Test 1: '.LCRun2::bch('helper3', Array(Array('people')), $cx, $in, function($cx, $in) {return '<li>'.LCRun2::encq(Array('name'), $cx, $in).' -> '.LCRun2::encq(Array('value'), $cx, $in).'</li>';}).'

. Test 2: '.LCRun2::bch('helper4', Array(Array('"people"')), $cx, $in, function($cx, $in) {return '
  <li>'.LCRun2::encq(Array('name'), $cx, $in).' -> '.LCRun2::encq(Array('value'), $cx, $in).'</li>
';}).'

. Test 3: '.LCRun2::sec(Array('people'), $cx, $in, true, function($cx, $in) {return '
  NOTE A: '.LCRun2::encq(Array('name'), $cx, $in).' : '.LCRun2::encq(Array(null), $cx, $in).' != '.LCRun2::encq(Array(1,null), $cx, $in).'
S~'.LCRun2::encq(Array(null), $cx, $in).'~'.LCRun2::bch('helper3', Array(), $cx, $in, function($cx, $in) {return '
  NOTE B: '.LCRun2::encq(Array('name'), $cx, $in).' : '.LCRun2::encq(Array(null), $cx, $in).' != '.LCRun2::encq(Array(1,null), $cx, $in).'
';}).'E
';}).'

. Test 4: '.LCRun2::bch('helper3', Array(), $cx, $in, function($cx, $in) {return 'ABC';}).'

. Test 5: '.LCRun2::bch('helper4', Array('val'=>Array('"123"'),'odd'=>Array('"1"')), $cx, $in, function($cx, $in) {return '~~~'.LCRun2::encq(Array(null), $cx, $in).'~~~';}).'

. Test 6: '.LCRun2::bch('helper4', Array('val'=>Array('people'),'odd'=>Array('test')), $cx, $in, function($cx, $in) {return 'TRY~~~'.LCRun2::encq(Array(null), $cx, $in).' , '.LCRun2::encq(Array(1,null), $cx, $in).' ~~~';}).'

. Test 7: '.LCRun2::sec(Array('people'), $cx, $in, true, function($cx, $in) {return ' 
 OK! 1 '.LCRun2::bch('helper3', Array('val'=>Array('name'),'odd'=>Array('value')), $cx, $in, function($cx, $in) {return 'TRY ?!??!!~~~'.LCRun2::encq(Array(null), $cx, $in).' , '.LCRun2::encq(Array(1,null), $cx, $in).' ~~~';}).'
 OK! '.LCRun2::bch('helper4', Array('val'=>Array('name'),'odd'=>Array('value')), $cx, $in, function($cx, $in) {return 'TRY ?!~~~'.LCRun2::encq(Array(null), $cx, $in).' , '.LCRun2::encq(Array(1,null), $cx, $in).' ~~~';}).'
';}).'
';
}
?>