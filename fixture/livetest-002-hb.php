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
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return ''.LCRun3::sec($cx, ((is_array($in) && isset($in['specs'])) ? $in['specs'] : null), $in, true, function($cx, $in) {return '
   <div class="item-spec">
    '.LCRun3::sec($cx, ((is_array($in) && isset($in['options'])) ? $in['options'] : null), $in, true, function($cx, $in) {return '
        '.LCRun3::ifv($cx, ((is_array($in) && isset($in['icon'])) ? $in['icon'] : null), $in, function($cx, $in) {return '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null)).'-'.LCRun3::encq($cx, ((is_array($in) && isset($in['id'])) ? $in['id'] : null)).'" value="'.LCRun3::encq($cx, ((is_array($in) && isset($in['id'])) ? $in['id'] : null)).'" name="'.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null)).'" alt="'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).'" data-name="'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).'"/>
            <label class="spec-label icon" for="spec-'.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null)).'-'.LCRun3::encq($cx, ((is_array($in) && isset($in['id'])) ? $in['id'] : null)).'" style="background-image:url('.LCRun3::encq($cx, ((is_array($in) && isset($in['icon'])) ? $in['icon'] : null)).');">
            </label>
        </div>
        ';}, function($cx, $in) {return '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null)).'-'.LCRun3::encq($cx, ((is_array($in) && isset($in['id'])) ? $in['id'] : null)).'" value="'.LCRun3::encq($cx, ((is_array($in) && isset($in['id'])) ? $in['id'] : null)).'" name="'.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null)).'" data-name="'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).'"/>
            <label class="spec-label" for="spec-'.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null)).'-'.LCRun3::encq($cx, ((is_array($in) && isset($in['id'])) ? $in['id'] : null)).'">'.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).'</label>
        </div>
        ';}).'
        <script>
            document.getElementById(\'spec-'.LCRun3::encq($cx, ((is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['id'])) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null)).'-'.LCRun3::encq($cx, ((is_array($in) && isset($in['id'])) ? $in['id'] : null)).'\').className += \'hidden\';
        </script>
    ';}).'
    </div>
';}).'
';
}
?>