<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return ''.LCRun2::sec((is_array($in) ? $in['specs'] : null), $cx, $in, true, function($cx, $in) {return '
   <div class="item-spec">
    '.LCRun2::sec((is_array($in) ? $in['options'] : null), $cx, $in, true, function($cx, $in) {return '
        '.LCRun2::ifv((is_array($in) ? $in['icon'] : null), $cx, $in, function($cx, $in) {return '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'-'.LCRun2::encq((is_array($in) ? $in['id'] : null), $cx).'" value="'.LCRun2::encq((is_array($in) ? $in['id'] : null), $cx).'" name="'.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'" alt="'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).'" data-name="'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).'"/>
            <label class="spec-label icon" for="spec-'.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'-'.LCRun2::encq((is_array($in) ? $in['id'] : null), $cx).'" style="background-image:url('.LCRun2::encq((is_array($in) ? $in['icon'] : null), $cx).');">
            </label>
        </div>
        ';}, function($cx, $in) {return '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'-'.LCRun2::encq((is_array($in) ? $in['id'] : null), $cx).'" value="'.LCRun2::encq((is_array($in) ? $in['id'] : null), $cx).'" name="'.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'" data-name="'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).'"/>
            <label class="spec-label" for="spec-'.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'-'.LCRun2::encq((is_array($in) ? $in['id'] : null), $cx).'">'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).'</label>
        </div>
        ';}).'
        <script>
            document.getElementById(\'spec-'.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['id'] : null), $cx).'-'.LCRun2::encq((is_array($in) ? $in['id'] : null), $cx).'\').className += \'hidden\';
        </script>
    ';}).'
    </div>
';}).'
';
}
?>