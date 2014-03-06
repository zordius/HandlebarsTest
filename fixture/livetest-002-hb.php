<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(            'helper1' => function($url, $txt) {
                $u = ($url !== null) ? $url : 'undefined';
                $t = ($txt !== null) ? $txt : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>";
            },
            'helper2' => function($hash) {
                $u = isset($hash['url']) ? $hash['url'] : 'undefined';
                $t = isset($hash['text']) ? $hash['text'] : 'undefined';
                $x = isset($hash['ur"l']) ? $hash['ur"l'] : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>({$x})";
            },
),
        'blockhelpers' => Array(            'helper3' => function($cx, $args) {
                return Array('test1', 'test2', 'test3');
            },
            'helper4' => function($cx, $args) {
                if (isset($args['val']) && is_array($cx)) {
                    $cx['helper4_value'] = $args['val'] % 2;
                    return $cx;
                }
                if (isset($args['odd'])) {
                    return Array(1,3,5,7,9);
                }
            },
),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return ''.LCRun2::sec(Array('specs'), $cx, $in, true, function($cx, $in) {return '
   <div class="item-spec">
    '.LCRun2::sec(Array('options'), $cx, $in, true, function($cx, $in) {return '
        '.((LCRun2::ifvar(Array('icon'), $cx, $in)) ? '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun2::encq(Array(1,'id'), $cx, $in).'-'.LCRun2::encq(Array('id'), $cx, $in).'" value="'.LCRun2::encq(Array('id'), $cx, $in).'" name="'.LCRun2::encq(Array(1,'id'), $cx, $in).'" alt="'.LCRun2::encq(Array('name'), $cx, $in).'" data-name="'.LCRun2::encq(Array('name'), $cx, $in).'"/>
            <label class="spec-label icon" for="spec-'.LCRun2::encq(Array(1,'id'), $cx, $in).'-'.LCRun2::encq(Array('id'), $cx, $in).'" style="background-image:url('.LCRun2::encq(Array('icon'), $cx, $in).');">
            </label>
        </div>
        ' : '
        <div class="spec">
            <div class="spec-overlay"></div>
            <input type="radio" id="spec-'.LCRun2::encq(Array(1,'id'), $cx, $in).'-'.LCRun2::encq(Array('id'), $cx, $in).'" value="'.LCRun2::encq(Array('id'), $cx, $in).'" name="'.LCRun2::encq(Array(1,'id'), $cx, $in).'" data-name="'.LCRun2::encq(Array('name'), $cx, $in).'"/>
            <label class="spec-label" for="spec-'.LCRun2::encq(Array(1,'id'), $cx, $in).'-'.LCRun2::encq(Array('id'), $cx, $in).'">'.LCRun2::encq(Array('name'), $cx, $in).'</label>
        </div>
        ').'
        <script>
            document.getElementById(\'spec-'.LCRun2::encq(Array(1,'id'), $cx, $in).'-'.LCRun2::encq(Array('id'), $cx, $in).'\').className += \'hidden\';
        </script>
    ';}).'
    </div>
';}).'
';
}
?>