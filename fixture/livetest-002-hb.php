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
    return ''.LCRun2::sec(((is_array($in) && isset($in['specs'])) ? $in['specs'] : null), $cx, $in, true, function($cx, $in) {return '
   <div class="item-spec">
    '.LCRun2::sec(((is_array($in) && isset($in['options'])) ? $in['options'] : null), $cx, $in, true, function($cx, $in) {return '
        '.LCRun2::ifv(((is_array($in) && isset($in['icon'])) ? $in['icon'] : null), $cx, $in, function($cx, $in) {return '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'-'.LCRun2::encq(((is_array($in) && isset($in['id'])) ? $in['id'] : null), $cx).'" value="'.LCRun2::encq(((is_array($in) && isset($in['id'])) ? $in['id'] : null), $cx).'" name="'.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'" alt="'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).'" data-name="'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).'"/>
            <label class="spec-label icon" for="spec-'.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'-'.LCRun2::encq(((is_array($in) && isset($in['id'])) ? $in['id'] : null), $cx).'" style="background-image:url('.LCRun2::encq(((is_array($in) && isset($in['icon'])) ? $in['icon'] : null), $cx).');">
            </label>
        </div>
        ';}, function($cx, $in) {return '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'-'.LCRun2::encq(((is_array($in) && isset($in['id'])) ? $in['id'] : null), $cx).'" value="'.LCRun2::encq(((is_array($in) && isset($in['id'])) ? $in['id'] : null), $cx).'" name="'.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'" data-name="'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).'"/>
            <label class="spec-label" for="spec-'.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'-'.LCRun2::encq(((is_array($in) && isset($in['id'])) ? $in['id'] : null), $cx).'">'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).'</label>
        </div>
        ';}).'
        <script>
            document.getElementById(\'spec-'.LCRun2::encq(((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'-'.LCRun2::encq(((is_array($in) && isset($in['id'])) ? $in['id'] : null), $cx).'\').className += \'hidden\';
        </script>
    ';}).'
    </div>
';}).'
';
}
?>