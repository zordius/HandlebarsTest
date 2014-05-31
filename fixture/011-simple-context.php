<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),

    );
    return ''.LCRun3::encq($cx, ((is_array($in) && isset($in['grand_parent_id'])) ? $in['grand_parent_id'] : null)).'
'.LCRun3::sec($cx, ((is_array($in) && isset($in['parent_contexts'])) ? $in['parent_contexts'] : null), $in, false, function($cx, $in) {return '
  '.LCRun3::encq($cx, ((is_array($in) && isset($in['parent_id'])) ? $in['parent_id'] : null)).' ('.LCRun3::encq($cx, ((is_array($in) && isset($in['grand_parent_id'])) ? $in['grand_parent_id'] : null)).')
  '.LCRun3::sec($cx, ((is_array($in) && isset($in['child_contexts'])) ? $in['child_contexts'] : null), $in, false, function($cx, $in) {return '
    '.LCRun3::encq($cx, ((is_array($in) && isset($in['child_id'])) ? $in['child_id'] : null)).' ('.LCRun3::encq($cx, ((is_array($in) && isset($in['parent_id'])) ? $in['parent_id'] : null)).' << '.LCRun3::encq($cx, ((is_array($in) && isset($in['grand_parent_id'])) ? $in['grand_parent_id'] : null)).')
  ';}).'
';}).'
';
}
?>