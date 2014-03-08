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