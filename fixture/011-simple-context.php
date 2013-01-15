<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return ''.LightnCandy::enc('grand_parent_id', $cx, $in).'
'.LightnCandy::sec('parent_contexts', $cx, $in, false, function($cx, $in) {return '
  '.LightnCandy::enc('parent_id', $cx, $in).' ('.LightnCandy::enc('grand_parent_id', $cx, $in).')
  '.LightnCandy::sec('child_contexts', $cx, $in, false, function($cx, $in) {return '
    '.LightnCandy::enc('child_id', $cx, $in).' ('.LightnCandy::enc('parent_id', $cx, $in).' << '.LightnCandy::enc('grand_parent_id', $cx, $in).')
  ';}).'
';}).'
';
}
?>