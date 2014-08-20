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
    return '<h1>'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('header'))).'</h1>
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('notEmpty')), $in, false, function($cx, $in) {return '<ul>
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('item')), $in, false, function($cx, $in) {return ''.LCRun3::sec($cx, LCRun3::v($cx, $in, array('current')), $in, false, function($cx, $in) {return '    <li><strong>'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).'</strong></li>
';}).''.((LCRun3::isec($cx, LCRun3::v($cx, $in, array('current')))) ? '    <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('url'))).'">'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).'</a></li>
' : '').'';}).'</ul>
';}).''.LCRun3::sec($cx, LCRun3::v($cx, $in, array('isEmpty')), $in, false, function($cx, $in) {return '<p>The list is empty.</p>
';}).'';
}
?>