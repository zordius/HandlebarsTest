<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return ''.LCRun::encq('grand_parent_id', $cx, $in).'
'.LCRun::sec('parent_contexts', $cx, $in, false, function($cx, $in) {return '
  '.LCRun::encq('parent_id', $cx, $in).' ('.LCRun::encq('grand_parent_id', $cx, $in).')
  '.LCRun::sec('child_contexts', $cx, $in, false, function($cx, $in) {return '
    '.LCRun::encq('child_id', $cx, $in).' ('.LCRun::encq('parent_id', $cx, $in).' << '.LCRun::encq('grand_parent_id', $cx, $in).')
  ';}).'
';}).'
';
}
?>