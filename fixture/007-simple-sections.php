<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => false,
            'jsobj' => false
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return '<h1>'.htmlentities($in['header'], ENT_QUOTES).'</h1>
'.LightnCandy::sec('notEmpty', $cx, $in, false, function($cx, $in) {return '
<ul>
'.LightnCandy::sec('item', $cx, $in, false, function($cx, $in) {return '
'.LightnCandy::sec('current', $cx, $in, false, function($cx, $in) {return '
    <li><strong>'.htmlentities($in['name'], ENT_QUOTES).'</strong></li>
';}).'
'.((is_null($in['current']) && ($in['current'] !== false)) ? ('
    <li><a href="'.htmlentities($in['url'], ENT_QUOTES).'">'.htmlentities($in['name'], ENT_QUOTES).'</a></li>
') : '').'
';}).'
</ul>
';}).'
'.LightnCandy::sec('isEmpty', $cx, $in, false, function($cx, $in) {return '
<p>The list is empty.</p>
';}).'
';
}
?>