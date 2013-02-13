<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => false,
            'jsobj' => false
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.htmlentities($in['winner']['name'], ENT_QUOTES).', you have just won $'.htmlentities($in['winner']['value'], ENT_QUOTES).'!
'.LightnCandy::sec('test', $cx, $in, false, function($cx, $in) {return '
Line 1
';}).'
This is a test, test = '.htmlentities($in['test'], ENT_QUOTES).'
'.LightnCandy::sec('test', $cx, $in, false, function($cx, $in) {return '
Line 2
';}).'
'.((is_null($in['test']) && ($in['test'] !== false)) ? ('
Line 3
') : '').'
'.((is_null($in['test']) && ($in['test'] !== false)) ? ('
Line 4
') : '').'
'.LightnCandy::sec('test', $cx, $in, false, function($cx, $in) {return '
Line 5
';}).'
'.((is_null($in['test']) && ($in['test'] !== false)) ? ('
Line 6
') : '').'
---- double section ----
'.LightnCandy::sec('sec', $cx, $in, false, function($cx, $in) {return '
'.htmlentities($in['name'], ENT_QUOTES).':'.htmlentities($in['value'], ENT_QUOTES).'
'.LightnCandy::sec('sec', $cx, $in, false, function($cx, $in) {return '-- '.htmlentities($in['name'], ENT_QUOTES).', '.htmlentities($in['value'], ENT_QUOTES).'--';}).'
';}).' 
';
}
?>