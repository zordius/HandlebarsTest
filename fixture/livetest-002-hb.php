<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return ''.LCRun::sec('specs', $cx, $in, true, function($cx, $in) {return '
   <div class="item-spec">
    '.LCRun::sec('options', $cx, $in, true, function($cx, $in) {return '
        '.LCRun::ifv('icon', $cx, $in, function($cx, $in) {return '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun::encq('../id', $cx, $in).'-'.LCRun::encq('id', $cx, $in).'" value="'.LCRun::encq('id', $cx, $in).'" name="'.LCRun::encq('../id', $cx, $in).'" alt="'.LCRun::encq('name', $cx, $in).'" data-name="'.LCRun::encq('name', $cx, $in).'"/>
            <label class="spec-label icon" for="spec-'.LCRun::encq('../id', $cx, $in).'-'.LCRun::encq('id', $cx, $in).'" style="background-image:url('.LCRun::encq('icon', $cx, $in).');">
            </label>
        </div>
        ';}, function($cx, $in) {return '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun::encq('../id', $cx, $in).'-'.LCRun::encq('id', $cx, $in).'" value="'.LCRun::encq('id', $cx, $in).'" name="'.LCRun::encq('../id', $cx, $in).'" data-name="'.LCRun::encq('name', $cx, $in).'"/>
            <label class="spec-label" for="spec-'.LCRun::encq('../id', $cx, $in).'-'.LCRun::encq('id', $cx, $in).'">'.LCRun::encq('name', $cx, $in).'</label>
        </div>
        ';}).'
        <script>
            document.getElementById(\'spec-'.LCRun::encq('../id', $cx, $in).'-'.LCRun::encq('id', $cx, $in).'\').className += \'hidden\';
        </script>
    ';}).'
    </div>
';}).'
';
}
?>