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
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('winner','name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('winner','value'))).'!
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('test')), $in, false, function($cx, $in) {return '
Line 1
';}).'
This is a test, test = '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('test'))).'
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('test')), $in, false, function($cx, $in) {return '
Line 2
';}).'
'.((LCRun3::isec($cx, LCRun3::v($cx, $in, array('test')))) ? '
Line 3
' : '').'
'.((LCRun3::isec($cx, LCRun3::v($cx, $in, array('test')))) ? '
Line 4
' : '').'
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('test')), $in, false, function($cx, $in) {return '
Line 5
';}).'
'.((LCRun3::isec($cx, LCRun3::v($cx, $in, array('test')))) ? '
Line 6
' : '').'
---- double section ----
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('sec')), $in, false, function($cx, $in) {return '
'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).':'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'
'.LCRun3::sec($cx, LCRun3::v($cx, $in, array('sec')), $in, false, function($cx, $in) {return '-- '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'--';}).'
';}).' 
';
}
?>