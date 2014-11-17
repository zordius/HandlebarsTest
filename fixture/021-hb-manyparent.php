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
            'echo' => false,
            'debug' => $debugopt,
        ),
        'helpers' => array(),
        'blockhelpers' => array(),
        'hbhelpers' => array(),
        'partials' => array(),
        'scopes' => array($in),
        'sp_vars' => array('root' => $in),

    );
    return 'Hello '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', you have just won $'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('value'))).'!
<ul>
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return ' <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('end'))).')</li>
 simple if~
'.LCRun3::ifv($cx, LCRun3::v($cx, $in, array('good')), $in, function($cx, $in) {return '  simple GOOD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('goodchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' X '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('end'))).'
';}).' if-else
'.LCRun3::ifv($cx, LCRun3::v($cx, $in, array('good')), $in, function($cx, $in) {return '  GOOD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('goodchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' X '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('end'))).'
';}, function($cx, $in) {return '  BAD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('badchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' Y '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).' = '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('end'))).'
';}).' with
'.LCRun3::wi($cx, LCRun3::v($cx, $in, array('good')), $in, function($cx, $in) {return '    WITH: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('gender'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).' , '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('end'))).'
';}).' simple unless
'.LCRun3::unl($cx, LCRun3::v($cx, $in, array('good')), $in, function($cx, $in) {return '   UNLESS good = bad -> '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).'
';}).' unless else
'.LCRun3::unl($cx, LCRun3::v($cx, $in, array('good')), $in, function($cx, $in) {return '   UNLESS good = bad -> '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).'
';}, function($cx, $in) {return '   UNLESS bad = good -> '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).'
';}).'';}).'----------THIS
'.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return ' <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('end'))).')</li>
'.LCRun3::ifv($cx, LCRun3::v($cx, $in, array('good')), $in, function($cx, $in) {return '  GOOD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('goodchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' X '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('end'))).'
';}, function($cx, $in) {return '  BAD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('badchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' Y '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).' = '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('end'))).'
';}).''.LCRun3::wi($cx, LCRun3::v($cx, $in, array('good')), $in, function($cx, $in) {return '    WITH: '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).' , '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('end'))).'
';}).'';}).'----------SECTION THIS
'.LCRun3::sec($cx, $in, $in, false, function($cx, $in) {return ' <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('end'))).')</li>
'.LCRun3::ifv($cx, LCRun3::v($cx, $in, array('good')), $in, function($cx, $in) {return '  GOOD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('goodchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' X '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('end'))).'
';}, function($cx, $in) {return '  BAD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('badchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' Y '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).' = '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('end'))).'
';}).''.LCRun3::wi($cx, LCRun3::v($cx, $in, array('good')), $in, function($cx, $in) {return '    WITH: '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).' , '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('end'))).'
';}).'';}).'----------SECTION .
'.LCRun3::sec($cx, $in, $in, false, function($cx, $in) {return ' <li>'.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' is a '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('gender'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('value'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('end'))).')</li>
'.LCRun3::ifv($cx, LCRun3::v($cx, $in, array('good')), $in, function($cx, $in) {return '  GOOD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('goodchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' X '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).' ~ '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('end'))).'
';}, function($cx, $in) {return '  BAD! '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('badchild'))).' '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' - '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' Y '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).' = '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('end'))).'
';}).''.LCRun3::wi($cx, LCRun3::v($cx, $in, array('good')), $in, function($cx, $in) {return '    WITH: '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('gender'))).' , '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).' , '.LCRun3::raw($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('end'))).'
';}).'';}).'</ul>
WITH TEST>
'.LCRun3::wi($cx, LCRun3::v($cx, $in, array('people')), $in, function($cx, $in) {return ' single: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).', '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('gender'))).' , p -> '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).'
 '.LCRun3::sec($cx, $in, $in, true, function($cx, $in) {return 'loop: '.LCRun3::encq($cx, LCRun3::v($cx, $in, array('name'))).' - '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-1], array('name'))).' - '.LCRun3::encq($cx, LCRun3::v($cx, $cx['scopes'][count($cx['scopes'])-2], array('name'))).'';}).'
';}).''.LCRun3::encq($cx, LCRun3::v($cx, $in, array('end'))).'
';
}
?>