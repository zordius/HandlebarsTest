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
    return 'Hello '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'!

##0 start section:
'.LCRun2::sec((is_array($in) ? $in['winners'] : null), $cx, $in, false, function($cx, $in) {return '
  - EACH 1- '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).'
';}).'
end section.

##1 start each:
'.LCRun2::sec((is_array($in) ? $in['winners'] : null), $cx, $in, true, function($cx, $in) {return '
  - EACH 2 - '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).'
';}).'
end each.

##3 Index
Index ?: '.LCRun2::encq((is_array($in['winners']) ? $in['winners']['name'] : null), $cx).'
Index 0: '.LCRun2::encq((is_array($in['winners']['0']) ? $in['winners']['0']['name'] : null), $cx).'
Index 1: '.LCRun2::encq((is_array($in['winners']['1']) ? $in['winners']['1']['name'] : null), $cx).'
';
}
?>