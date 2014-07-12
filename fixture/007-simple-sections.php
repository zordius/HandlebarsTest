<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'partials' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return '<h1>'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('header'))).'</h1>
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('notEmpty')), $in, false, function($cx, $in) {return '
<ul>
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('item')), $in, false, function($cx, $in) {return '
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('current')), $in, false, function($cx, $in) {return '
    <li><strong>'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).'</strong></li>
';}).'
'.((LCRun3::isec($cx, LCRun3::v($cx, $in, Array('current')))) ? '
    <li><a href="'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('url'))).'">'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).'</a></li>
' : '').'
';}).'
</ul>
';}).'
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('isEmpty')), $in, false, function($cx, $in) {return '
<p>The list is empty.</p>
';}).'
';
}
?>