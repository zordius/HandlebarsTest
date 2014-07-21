<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'prop' => true,
            'method' => false,
            'mustlok' => false,
            'mustsec' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'partials' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('winner','name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('winner','value'))).'!
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('test')), $in, false, function($cx, $in) {return '
Line 1
';}).'
This is a test, test = '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('test'))).'
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('test')), $in, false, function($cx, $in) {return '
Line 2
';}).'
'.((LCRun3::isec($cx, LCRun3::v($cx, $in, Array('test')))) ? '
Line 3
' : '').'
'.((LCRun3::isec($cx, LCRun3::v($cx, $in, Array('test')))) ? '
Line 4
' : '').'
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('test')), $in, false, function($cx, $in) {return '
Line 5
';}).'
'.((LCRun3::isec($cx, LCRun3::v($cx, $in, Array('test')))) ? '
Line 6
' : '').'
---- double section ----
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('sec')), $in, false, function($cx, $in) {return '
'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).':'.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('sec')), $in, false, function($cx, $in) {return '-- '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('value'))).'--';}).'
';}).' 
';
}
?>