<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return ''.LCRun::sec('specs', $cx, $in, true, function($cx, $in) {return '
   <div class="item-spec">
    '.LCRun::sec('options', $cx, $in, true, function($cx, $in) {return '
        '.LCRun::ifv('icon', $cx, $in, function($cx, $in) {return '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun::enc('../id', $cx, $in).'-'.LCRun::enc('id', $cx, $in).'" value="'.LCRun::enc('id', $cx, $in).'" name="'.LCRun::enc('../id', $cx, $in).'" alt="'.LCRun::enc('name', $cx, $in).'" data-name="'.LCRun::enc('name', $cx, $in).'"/>
            <label class="spec-label icon" for="spec-'.LCRun::enc('../id', $cx, $in).'-'.LCRun::enc('id', $cx, $in).'" style="background-image:url('.LCRun::enc('icon', $cx, $in).');">
            </label>
        </div>
        ';}, function($cx, $in) {return '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun::enc('../id', $cx, $in).'-'.LCRun::enc('id', $cx, $in).'" value="'.LCRun::enc('id', $cx, $in).'" name="'.LCRun::enc('../id', $cx, $in).'" data-name="'.LCRun::enc('name', $cx, $in).'"/>
            <label class="spec-label" for="spec-'.LCRun::enc('../id', $cx, $in).'-'.LCRun::enc('id', $cx, $in).'">'.LCRun::enc('name', $cx, $in).'</label>
        </div>
        ';}).'
        <script>
            document.getElementById(\'spec-'.LCRun::enc('../id', $cx, $in).'-'.LCRun::enc('id', $cx, $in).'\').className += \'hidden\';
        </script>
    ';}).'
    </div>
';}).'
';
}
?>