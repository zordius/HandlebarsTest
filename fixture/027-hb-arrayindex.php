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
    return 'Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!

##0 start section:
'.LCRun::sec('winners', $cx, $in, false, function($cx, $in) {return '
  - EACH 1- '.LCRun::encq('name', $cx, $in).'
';}).'
end section.

##1 start each:
'.LCRun::sec('winners', $cx, $in, true, function($cx, $in) {return '
  - EACH 2 - '.LCRun::encq('name', $cx, $in).'
';}).'
end each.

##3 Index
Index ?: '.LCRun::encq('winners]name', $cx, $in).'
Index 0: '.LCRun::encq('winners]0]name', $cx, $in).'
Index 1: '.LCRun::encq('winners]1]name', $cx, $in).'
';
}
?>