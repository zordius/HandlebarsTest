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
    return 'Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

##0 start section:
'.LCRun2::sec(Array('winners'), $cx, $in, false, function($cx, $in) {return '
  - EACH 1 - '.LCRun2::encq(Array('name'), $cx, $in).' ~ '.LCRun2::encq(Array(1,'name'), $cx, $in).'
  Name:'.LCRun2::encq(Array('name'), $cx, $in).', Value:'.LCRun2::encq(Array('value'), $cx, $in).', This: '.LCRun2::encq(Array(null), $cx, $in).', Test: '.LCRun2::encq(Array('test'), $cx, $in).'

  - EACH 2- '.LCRun2::encq(Array('name'), $cx, $in).' ~ '.LCRun2::encq(Array(1,'name'), $cx, $in).'
';}).'
end section.

##1 start each:
'.LCRun2::sec(Array('winners'), $cx, $in, true, function($cx, $in) {return '
  - EACH 3 - '.LCRun2::encq(Array('name'), $cx, $in).' ~ '.LCRun2::encq(Array(1,'name'), $cx, $in).'
  Name:'.LCRun2::encq(Array('name'), $cx, $in).', Value:'.LCRun2::encq(Array('value'), $cx, $in).', This: '.LCRun2::encq(Array(null), $cx, $in).', Test: '.LCRun2::encq(Array('test'), $cx, $in).'

  - EACH 4 - '.LCRun2::encq(Array('name'), $cx, $in).' ~ '.LCRun2::encq(Array(1,'name'), $cx, $in).'
';}).'
end each.

##2 start each+if:
'.LCRun2::sec(Array('winners'), $cx, $in, true, function($cx, $in) {return '
 '.((LCRun2::ifvar(Array('test'), $cx, $in)) ? '
  Name:'.LCRun2::encq(Array('name'), $cx, $in).', Value:'.LCRun2::encq(Array('value'), $cx, $in).', This: '.LCRun2::encq(Array(null), $cx, $in).', Test: '.LCRun2::encq(Array('test'), $cx, $in).'

 ' : '').'
';}).'
end each+if.

##3 start each+if+with:
'.LCRun2::sec(Array('winners'), $cx, $in, true, function($cx, $in) {return '
 '.((LCRun2::ifvar(Array('test'), $cx, $in)) ? '
  '.LCRun2::wi(Array('people'), $cx, $in, function($cx, $in) {return '
   Name:'.LCRun2::encq(Array('name'), $cx, $in).', Value:'.LCRun2::encq(Array('value'), $cx, $in).', This: '.LCRun2::encq(Array(null), $cx, $in).', Test: '.LCRun2::encq(Array('test'), $cx, $in).'

  ';}).'
 ' : '').'
';}).'
end each+if+with.

##4 start each+with+if:
'.LCRun2::sec(Array('winners'), $cx, $in, true, function($cx, $in) {return '
 '.LCRun2::wi(Array('people'), $cx, $in, function($cx, $in) {return '
  '.((LCRun2::ifvar(Array('test'), $cx, $in)) ? '
   Name:'.LCRun2::encq(Array('name'), $cx, $in).', Value:'.LCRun2::encq(Array('value'), $cx, $in).', This: '.LCRun2::encq(Array(null), $cx, $in).', Test: '.LCRun2::encq(Array('test'), $cx, $in).'

  ' : '').'
 ';}).'
';}).'
end each+with+if.
';
}
?>