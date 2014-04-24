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
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return ''.LCRun2::encq(((is_array($in) && isset($in['grand_parent_id'])) ? $in['grand_parent_id'] : null), $cx).'
'.LCRun2::sec(((is_array($in) && isset($in['parent_contexts'])) ? $in['parent_contexts'] : null), $cx, $in, false, function($cx, $in) {return '
  '.LCRun2::encq(((is_array($in) && isset($in['parent_id'])) ? $in['parent_id'] : null), $cx).' ('.LCRun2::encq(((is_array($in) && isset($in['grand_parent_id'])) ? $in['grand_parent_id'] : null), $cx).')
  '.LCRun2::sec(((is_array($in) && isset($in['child_contexts'])) ? $in['child_contexts'] : null), $cx, $in, false, function($cx, $in) {return '
    '.LCRun2::encq(((is_array($in) && isset($in['child_id'])) ? $in['child_id'] : null), $cx).' ('.LCRun2::encq(((is_array($in) && isset($in['parent_id'])) ? $in['parent_id'] : null), $cx).' << '.LCRun2::encq(((is_array($in) && isset($in['grand_parent_id'])) ? $in['grand_parent_id'] : null), $cx).')
  ';}).'
';}).'
';
}
?>