<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return ''.LCRun2::encq((is_array($in) ? $in['grand_parent_id'] : null), $cx).'
'.LCRun2::sec((is_array($in) ? $in['parent_contexts'] : null), $cx, $in, false, function($cx, $in) {return '
  '.LCRun2::encq((is_array($in) ? $in['parent_id'] : null), $cx).' ('.LCRun2::encq((is_array($in) ? $in['grand_parent_id'] : null), $cx).')
  '.LCRun2::sec((is_array($in) ? $in['child_contexts'] : null), $cx, $in, false, function($cx, $in) {return '
    '.LCRun2::encq((is_array($in) ? $in['child_id'] : null), $cx).' ('.LCRun2::encq((is_array($in) ? $in['parent_id'] : null), $cx).' << '.LCRun2::encq((is_array($in) ? $in['grand_parent_id'] : null), $cx).')
  ';}).'
';}).'
';
}
?>