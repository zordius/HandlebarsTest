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
        'path' => Array(),

    );
    return '<ul class="items">
	'.LCRun2::sec(((is_array($in) && isset($in['items'])) ? $in['items'] : null), $cx, $in, true, function($cx, $in) {return '
		<li>'.LCRun2::encq($in, $cx).' for '.LCRun2::encq(((is_array($cx['scopes'][0]) && isset($cx['scopes'][0]['user'])) ? $cx['scopes'][0]['user'] : null), $cx).'</li>
	';}).'
</ul>
';
}
?>