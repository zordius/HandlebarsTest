<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return ''.LCRun::enc('grand_parent_id', $cx, $in).'
'.LCRun::sec('parent_contexts', $cx, $in, false, function($cx, $in) {return '
  '.LCRun::enc('parent_id', $cx, $in).' ('.LCRun::enc('grand_parent_id', $cx, $in).')
  '.LCRun::sec('child_contexts', $cx, $in, false, function($cx, $in) {return '
    '.LCRun::enc('child_id', $cx, $in).' ('.LCRun::enc('parent_id', $cx, $in).' << '.LCRun::enc('grand_parent_id', $cx, $in).')
  ';}).'
';}).'
';
}
?>