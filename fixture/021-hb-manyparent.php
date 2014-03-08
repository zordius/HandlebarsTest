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
    return 'Hello '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'!
<ul>
'.LCRun2::sec($in, $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' is a '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).' ('.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['value'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['end'] : null), $cx).')</li>
 simple if~
 '.LCRun2::ifv((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
  simple GOOD! '.LCRun2::encq((is_array($in) ? $in['goodchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' X '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' ~ '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
 if-else
 '.LCRun2::ifv((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun2::encq((is_array($in) ? $in['goodchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' X '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' ~ '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun2::encq((is_array($in) ? $in['badchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' Y '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' = '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
 with
 '.LCRun2::wi((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' , '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
 simple unless
 '.LCRun2::unl((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
   UNLESS good = bad -> '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).'
 ';}).'
 unless else
 '.LCRun2::unl((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
   UNLESS good = bad -> '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).'
 ';}, function($cx, $in) {return '
   UNLESS bad = good -> '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).'
 ';}).'
';}).'
----------THIS
'.LCRun2::sec($in, $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' is a '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).' ('.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['value'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['end'] : null), $cx).')</li>
 '.LCRun2::ifv((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun2::encq((is_array($in) ? $in['goodchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' X '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' ~ '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun2::encq((is_array($in) ? $in['badchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' Y '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' = '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
 '.LCRun2::wi((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' , '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
';}).'
----------SECTION THIS
'.LCRun2::sec($in, $cx, $in, false, function($cx, $in) {return '
 <li>'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' is a '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).' ('.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['value'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['end'] : null), $cx).')</li>
 '.LCRun2::ifv((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun2::encq((is_array($in) ? $in['goodchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' X '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' ~ '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun2::encq((is_array($in) ? $in['badchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' Y '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' = '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
 '.LCRun2::wi((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' , '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
';}).'
----------SECTION .
'.LCRun2::sec($in, $cx, $in, false, function($cx, $in) {return '
 <li>'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' is a '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).' ('.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['value'] : null), $cx).', '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['end'] : null), $cx).')</li>
 '.LCRun2::ifv((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
  GOOD! '.LCRun2::encq((is_array($in) ? $in['goodchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' X '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' ~ '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}, function($cx, $in) {return '
  BAD! '.LCRun2::encq((is_array($in) ? $in['badchild'] : null), $cx).' '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' - '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' Y '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' = '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
 '.LCRun2::wi((is_array($in) ? $in['good'] : null), $cx, $in, function($cx, $in) {return '
    WITH: '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['gender'] : null), $cx).' , '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).' , '.LCRun2::raw((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['end'] : null), $cx).'
 ';}).'
';}).'
</ul>
WITH TEST>
'.LCRun2::wi((is_array($in) ? $in['people'] : null), $cx, $in, function($cx, $in) {return '
 single: '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', '.LCRun2::encq((is_array($in) ? $in['gender'] : null), $cx).' , p -> '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).'
 '.LCRun2::sec($in, $cx, $in, true, function($cx, $in) {return 'loop: '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).' - '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-1]) ? $cx['scopes'][count($cx['scopes'])-1]['name'] : null), $cx).' - '.LCRun2::encq((is_array($cx['scopes'][count($cx['scopes'])-2]) ? $cx['scopes'][count($cx['scopes'])-2]['name'] : null), $cx).'';}).'
';}).'
'.LCRun2::encq((is_array($in) ? $in['end'] : null), $cx).'
';
}
?>