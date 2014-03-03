<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(            'helper1' => function($url, $txt) {
                $u = ($url !== null) ? $url : 'undefined';
                $t = ($txt !== null) ? $txt : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>";
            },
),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return ''.LCRun2::encq(Array('grand_parent_id'), $cx, $in).'
'.LCRun2::sec(Array('parent_contexts'), $cx, $in, false, function($cx, $in) {return '
  '.LCRun2::encq(Array('parent_id'), $cx, $in).' ('.LCRun2::encq(Array('grand_parent_id'), $cx, $in).')
  '.LCRun2::sec(Array('child_contexts'), $cx, $in, false, function($cx, $in) {return '
    '.LCRun2::encq(Array('child_id'), $cx, $in).' ('.LCRun2::encq(Array('parent_id'), $cx, $in).' << '.LCRun2::encq(Array('grand_parent_id'), $cx, $in).')
  ';}).'
';}).'
';
}
?>