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
        'helpers' => array(),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array('root' => $in),

    );
    
    return '<ul class="items">
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('items')), $in, true, function($cx, $in) {return '		<li>'.LCRun3::encq($cx, $in).' for '.LCRun3::encq($cx, LCRun3::v($cx, $cx['sp_vars'], array('root','user'))).'</li>
';}).'</ul>
';
}
?>