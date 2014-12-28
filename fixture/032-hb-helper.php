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
        'constants' => array(),
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

. Test 1: '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),LCRun3::v($cx, $in, array('text'))),array()), 'raw').'
. Test 2: '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),LCRun3::v($cx, $in, array('text'))),array()), 'encq').'
. Test 3: '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('test','url')),LCRun3::v($cx, $in, array('test','text'))),array()), 'encq').'
. Test 4: '.LCRun3::sec($cx, LCRun3::v($cx, $in, array('people')), $in, true, function($cx, $in) {return '
  * '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('url')),LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('text'))),array()), 'encq').' <= '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('url'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('text'))).', '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('url'))).', '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('text'))).' !!
  * '.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),LCRun3::v($cx, $in, array('text'))),array()), 'encq').' <= '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('url'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('text'))).' , '.LCRun3::raw($cx, LCRun3::v($cx, $in, array('url'))).', '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('text'))).' :D
';}).'';
}
?>