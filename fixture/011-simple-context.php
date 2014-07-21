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
    return ''.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('grand_parent_id'))).'
'.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('parent_contexts')), $in, false, function($cx, $in) {return '
  '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('parent_id'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('grand_parent_id'))).')
  '.LCRun3::sec($cx, LCRun3::v($cx, $in, Array('child_contexts')), $in, false, function($cx, $in) {return '
    '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('child_id'))).' ('.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('parent_id'))).' << '.LCRun3::encq($cx, LCRun3::v($cx, $in, Array('grand_parent_id'))).')
  ';}).'
';}).'
';
}
?>