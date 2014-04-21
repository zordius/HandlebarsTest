<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(((is_array($in['winner']) && isset($in['winner']['name'])) ? $in['winner']['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in['winner']) && isset($in['winner']['value'])) ? $in['winner']['value'] : null), $cx).'!
'.LCRun2::sec(((is_array($in) && isset($in['test'])) ? $in['test'] : null), $cx, $in, false, function($cx, $in) {return '
Line 1
';}).'
This is a test, test = '.LCRun2::encq(((is_array($in) && isset($in['test'])) ? $in['test'] : null), $cx).'
'.LCRun2::sec(((is_array($in) && isset($in['test'])) ? $in['test'] : null), $cx, $in, false, function($cx, $in) {return '
Line 2
';}).'
'.((LCRun2::isec(((is_array($in) && isset($in['test'])) ? $in['test'] : null))) ? '
Line 3
' : '').'
'.((LCRun2::isec(((is_array($in) && isset($in['test'])) ? $in['test'] : null))) ? '
Line 4
' : '').'
'.LCRun2::sec(((is_array($in) && isset($in['test'])) ? $in['test'] : null), $cx, $in, false, function($cx, $in) {return '
Line 5
';}).'
'.((LCRun2::isec(((is_array($in) && isset($in['test'])) ? $in['test'] : null))) ? '
Line 6
' : '').'
---- double section ----
'.LCRun2::sec(((is_array($in) && isset($in['sec'])) ? $in['sec'] : null), $cx, $in, false, function($cx, $in) {return '
'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).':'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'
'.LCRun2::sec(((is_array($in) && isset($in['sec'])) ? $in['sec'] : null), $cx, $in, false, function($cx, $in) {return '-- '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', '.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'--';}).'
';}).' 
';
}
?>