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
    return 'Hello '.LCRun3::encq($cx, ((is_array($in['winner']) && isset($in['winner']['name'])) ? $in['winner']['name'] : null)).', you have just won $'.LCRun3::encq($cx, ((is_array($in['winner']) && isset($in['winner']['value'])) ? $in['winner']['value'] : null)).'!
We have $'.LCRun3::encq($cx, ((is_array($in['award']['first']) && isset($in['award']['first']['value'])) ? $in['award']['first']['value'] : null)).' for '.LCRun3::encq($cx, ((is_array($in['award']['first']) && isset($in['award']['first']['name'])) ? $in['award']['first']['name'] : null)).' award!!
Raw dot test: '.LCRun3::encq($cx, ((is_array($in['winner']) && isset($in['winner']['name'])) ? $in['winner']['name'] : null)).' '.LCRun3::raw($cx, ((is_array($in['award']['first']) && isset($in['award']['first']['value'])) ? $in['award']['first']['value'] : null)).' for '.LCRun3::raw($cx, ((is_array($in['award']['first']) && isset($in['award']['first']['name'])) ? $in['award']['first']['name'] : null)).'
';
}
?>