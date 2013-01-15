<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return '<h1>'.LightnCandy::enc('header', $cx, $in).'</h1>
'.LightnCandy::sec('notEmpty', $cx, $in, false, function($cx, $in) {return '
<ul>
'.LightnCandy::sec('item', $cx, $in, false, function($cx, $in) {return '
'.LightnCandy::sec('current', $cx, $in, false, function($cx, $in) {return '
    <li><strong>'.LightnCandy::enc('name', $cx, $in).'</strong></li>
';}).'
'.(LightnCandy::isec('current', $in) ? ('
    <li><a href="'.LightnCandy::enc('url', $cx, $in).'">'.LightnCandy::enc('name', $cx, $in).'</a></li>
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