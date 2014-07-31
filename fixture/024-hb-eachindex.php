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
    return '<ul>
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('people')), $in, true, function($cx, $in) {return '
 <li>'.LCRun3::encq($cx, (isset($cx['sp_vars']['index'])?$cx['sp_vars']['index']:'')).', '.LCRun3::encq($cx, (isset($cx['sp_vars']['key'])?$cx['sp_vars']['key']:'')).' : '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' '.LCRun3::ifv($cx, LCRun3::v($cx, $in, array('name')), $in, function($cx, $in) {return '(V)';}).''.LCRun3::ifv($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('test')), $in, function($cx, $in) {return '(Y)';}).'</li>
';}).'
</ul>
';
}
?>