<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => false,
            'jsobj' => false
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return ''.htmlentities($in['grand_parent_id'], ENT_QUOTES).'
'.LightnCandy::sec('parent_contexts', $cx, $in, false, function($cx, $in) {return '
  '.htmlentities($in['parent_id'], ENT_QUOTES).' ('.htmlentities($in['grand_parent_id'], ENT_QUOTES).')
  '.LightnCandy::sec('child_contexts', $cx, $in, false, function($cx, $in) {return '
    '.htmlentities($in['child_id'], ENT_QUOTES).' ('.htmlentities($in['parent_id'], ENT_QUOTES).' << '.htmlentities($in['grand_parent_id'], ENT_QUOTES).')
  ';}).'
';}).'
';
}
?>