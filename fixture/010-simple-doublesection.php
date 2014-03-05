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
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(Array('winner','name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('winner','value'), $cx, $in).'!
'.LCRun2::sec(Array('test'), $cx, $in, false, function($cx, $in) {return '
Line 1
';}).'
This is a test, test = '.LCRun2::encq(Array('test'), $cx, $in).'
'.LCRun2::sec(Array('test'), $cx, $in, false, function($cx, $in) {return '
Line 2
';}).'
'.((LCRun2::isec(Array('test'), $cx, $in)) ? '
Line 3
' : '').'
'.((LCRun2::isec(Array('test'), $cx, $in)) ? '
Line 4
' : '').'
'.LCRun2::sec(Array('test'), $cx, $in, false, function($cx, $in) {return '
Line 5
';}).'
'.((LCRun2::isec(Array('test'), $cx, $in)) ? '
Line 6
' : '').'
---- double section ----
'.LCRun2::sec(Array('sec'), $cx, $in, false, function($cx, $in) {return '
'.LCRun2::encq(Array('name'), $cx, $in).':'.LCRun2::encq(Array('value'), $cx, $in).'
'.LCRun2::sec(Array('sec'), $cx, $in, false, function($cx, $in) {return '-- '.LCRun2::encq(Array('name'), $cx, $in).', '.LCRun2::encq(Array('value'), $cx, $in).'--';}).'
';}).' 
';
}
?>