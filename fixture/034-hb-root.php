<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return '<ul class="items">
	'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('items')), $in, true, function($cx, $in) {return '
		<li>'.LCRun3::encq($cx, $in).' for '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][0], Array('user'))).'</li>
	';}).'
</ul>
';
}
?>