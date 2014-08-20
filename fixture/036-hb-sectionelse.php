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
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array(),

    );
    return '
Children for '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).':
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('child')), $in, false, function($cx, $in) {return ''.LCRun3::ifv($cx, LCRun3::v($cx, $in, array('key')), $in, function($cx, $in) {return '       The value is = '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('key'))).' !!
';}, function($cx, $in) {return '        key is empty or null
';}).'';}, function($cx, $in) {return '  '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).' has no children.
';}).'';
}
?>