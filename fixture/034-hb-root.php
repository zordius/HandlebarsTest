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
    return '<ul class="items">
	'.LCRun3::sec($cx, ((is_array($in) && isset($in['items'])) ? $in['items'] : null), $in, true, function($cx, $in) {return '
		<li>'.LCRun3::encq($cx, $in).' for '.LCRun3::encq($cx, ((is_array($cx['scopes'][0]) && isset($cx['scopes'][0]['user'])) ? $cx['scopes'][0]['user'] : null)).'</li>
	';}).'
</ul>
';
}
?>