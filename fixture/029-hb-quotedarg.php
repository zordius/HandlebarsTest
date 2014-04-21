<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
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
    return 'Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!

. Test 1: '.((LCRun2::ifvar('')) ? 'OK' : '').' !!
. Test 2: '.LCRun2::encq(((is_array($in['test']) && isset($in['test']['a b'])) ? $in['test']['a b'] : null), $cx).' !!
. Test 3: '.LCRun2::encq(((is_array($in['te"st']) && isset($in['te"st']['cd'])) ? $in['te"st']['cd'] : null), $cx).' !!
. Test 4: '.((LCRun2::ifvar(((is_array($in) && isset($in['te"st'])) ? $in['te"st'] : null))) ? 'OK' : '').' !!
. Test 5: '.LCRun2::ch('helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test & OK'), 'raw', $cx).' !!
. Test 6: '.LCRun2::ch('helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test'), 'raw', $cx).' !!
. Test 7: '.LCRun2::ch('helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test & OK'), 'encq', $cx).' !!
. Test 8: '.LCRun2::ch('helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this is a test'), 'encq', $cx).' !!
. Test 9: '.LCRun2::ch('helper1', Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),'this.is.atest'), 'encq', $cx).' !!
';
}
?>