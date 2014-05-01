<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return '<h1>'.LCRun3::encq($cx, ((is_array($in) && isset($in['header'])) ? $in['header'] : null)).'</h1>
'.LCRun3::sec($cx, ((is_array($in) && isset($in['notEmpty'])) ? $in['notEmpty'] : null), $in, false, function($cx, $in) {return '
<ul>
'.LCRun3::sec($cx, ((is_array($in) && isset($in['item'])) ? $in['item'] : null), $in, false, function($cx, $in) {return '
'.LCRun3::sec($cx, ((is_array($in) && isset($in['current'])) ? $in['current'] : null), $in, false, function($cx, $in) {return '
    <li><strong>'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).'</strong></li>
';}).'
'.((LCRun3::isec($cx, ((is_array($in) && isset($in['current'])) ? $in['current'] : null))) ? '
    <li><a href="'.LCRun3::encq($cx, ((is_array($in) && isset($in['url'])) ? $in['url'] : null)).'">'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).'</a></li>
' : '').'
';}).'
</ul>
';}).'
'.LCRun3::sec($cx, ((is_array($in) && isset($in['isEmpty'])) ? $in['isEmpty'] : null), $in, false, function($cx, $in) {return '
<p>The list is empty.</p>
';}).'
';
}
?>