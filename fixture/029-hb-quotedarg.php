<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'debug' => $debugopt,
        ),
        'helpers' => Array(            'helper1' => function($url, $txt) {
                $u = ($url !== null) ? $url : 'undefined';
                $t = ($txt !== null) ? $txt : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>";
            },
),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', you have just won $'.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).'!

. Test 1: '.((LCRun3::ifvar($cx, '')) ? 'OK' : '').' !!
. Test 2: '.LCRun3::encq($cx, ((is_array($in['test']) && isset($in['test']['a b'])) ? $in['test']['a b'] : null)).' !!
. Test 3: '.LCRun3::encq($cx, ((is_array($in['te"st']) && isset($in['te"st']['cd'])) ? $in['te"st']['cd'] : null)).' !!
. Test 4: '.((LCRun3::ifvar($cx, ((is_array($in) && isset($in['te"st'])) ? $in['te"st'] : null))) ? 'OK' : '').' !!
. Test 5: '.LCRun3::ch($cx, 'helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test & OK'), 'raw').' !!
. Test 6: '.LCRun3::ch($cx, 'helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test'), 'raw').' !!
. Test 7: '.LCRun3::ch($cx, 'helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test & OK'), 'encq').' !!
. Test 8: '.LCRun3::ch($cx, 'helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test'), 'encq').' !!
. Test 9: '.LCRun3::ch($cx, 'helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this.is.atest'), 'encq').' !!
';
}
?>