<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return ''.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('specs')), $in, true, function($cx, $in) {return '
   <div class="item-spec">
    '.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('options')), $in, true, function($cx, $in) {return '
        '.LCRun3::ifv($cx, LCRun3::v($cx, $in, Array('icon')), $in, function($cx, $in) {return '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('id'))).'-'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('id'))).'" value="'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('id'))).'" name="'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('id'))).'" alt="'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).'" data-name="'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).'"/>
            <label class="spec-label icon" for="spec-'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('id'))).'-'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('id'))).'" style="background-image:url('.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('icon'))).');">
            </label>
        </div>
        ';}, function($cx, $in) {return '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('id'))).'-'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('id'))).'" value="'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('id'))).'" name="'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('id'))).'" data-name="'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).'"/>
            <label class="spec-label" for="spec-'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('id'))).'-'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('id'))).'">'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).'</label>
        </div>
        ';}).'
        <script>
            document.getElementById(\'spec-'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], Array('id'))).'-'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('id'))).'\').className += \'hidden\';
        </script>
    ';}).'
    </div>
';}).'
';
}
?>