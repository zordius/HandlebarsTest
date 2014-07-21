<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'mustsec' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(            'helper1' => function($args, $named) {
    $u = (isset($args[0])) ? $args[0] : 'undefined';
    $t = (isset($args[1])) ? $args[1] : 'undefined';
    return "<a href=\"{$u}\">{$t}</a>";
},
),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'partials' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'!

. Test 1: '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('url')),LCRun3::v($cx, $in, Array('text'))),Array()), 'raw').'
. Test 2: '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('url')),LCRun3::v($cx, $in, Array('text'))),Array()), 'encq').'
. Test 3: '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('test','url')),LCRun3::v($cx, $in, Array('test','text'))),Array()), 'encq').'
. Test 4: '.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('people')), $in, true, function($cx, $in) {return '
  * '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('url')),LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('text'))),Array()), 'encq').' <= '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('url'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('text'))).', '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('url'))).', '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('text'))).' !!
  * '.LCRun3::ch($cx, 'helper1', Array(Array(LCRun3::v($cx, $in, Array('url')),LCRun3::v($cx, $in, Array('text'))),Array()), 'encq').' <= '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('url'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('text'))).' , '.LCRun3::raw($cx, LCRun3::v($cx, $in, Array('url'))).', '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('text'))).' :D
';}).'
';
}
?>