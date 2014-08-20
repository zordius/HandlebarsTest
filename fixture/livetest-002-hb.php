<?php return function ($in, $debugopt = 1) {
    $cx = array(
        'flags' => array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'mustsec' => false,
            'debug' => $debugopt,
        ),
        'helpers' => array(),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array(),

    );
    return ''.LCRun3::sec($cx, LCRun3::v($cx, $in, array('specs')), $in, true, function($cx, $in) {return '   <div class="item-spec">
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('options')), $in, true, function($cx, $in) {return ''.LCRun3::ifv($cx, LCRun3::v($cx, $in, array('icon')), $in, function($cx, $in) {return '        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('id'))).'-'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('id'))).'" value="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('id'))).'" name="'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('id'))).'" alt="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).'" data-name="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).'"/>
            <label class="spec-label icon" for="spec-'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('id'))).'-'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('id'))).'" style="background-image:url('.LCRun3::encq($cx, LCRun3::v($cx, $in, array('icon'))).');">
            </label>
        </div>
';}, function($cx, $in) {return '        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('id'))).'-'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('id'))).'" value="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('id'))).'" name="'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('id'))).'" data-name="'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).'"/>
            <label class="spec-label" for="spec-'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('id'))).'-'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('id'))).'">'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).'</label>
        </div>
';}).'        <script>
            document.getElementById(\'spec-'.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('id'))).'-'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('id'))).'\').className += \'hidden\';
        </script>
';}).'    </div>
';}).'';
}
?>