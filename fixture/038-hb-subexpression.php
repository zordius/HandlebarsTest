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
    return ''.LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url')),LCRun3::ch($cx, 'helper1', array(array(LCRun3::v($cx, $in, array('url2')),LCRun3::v($cx, $in, array('text'))),array()), 'raw')),array()), 'raw').'

';
}
?>