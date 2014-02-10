<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!

##0 start section:
'.LCRun::sec('winners', $cx, $in, false, function($cx, $in) {return '
  - EACH 1 - '.LCRun::enc('name', $cx, $in).' ~ '.LCRun::enc('../name', $cx, $in).'
  Name:'.LCRun::enc('name', $cx, $in).', Value:'.LCRun::enc('value', $cx, $in).', This: '.LCRun::enc('', $cx, $in).', Test: '.LCRun::enc('test', $cx, $in).'

  - EACH 2- '.LCRun::enc('name', $cx, $in).' ~ '.LCRun::enc('../name', $cx, $in).'
';}).'
end section.

##1 start each:
'.LCRun::sec('winners', $cx, $in, true, function($cx, $in) {return '
  - EACH 3 - '.LCRun::enc('name', $cx, $in).' ~ '.LCRun::enc('../name', $cx, $in).'
  Name:'.LCRun::enc('name', $cx, $in).', Value:'.LCRun::enc('value', $cx, $in).', This: '.LCRun::enc('', $cx, $in).', Test: '.LCRun::enc('test', $cx, $in).'

  - EACH 4 - '.LCRun::enc('name', $cx, $in).' ~ '.LCRun::enc('../name', $cx, $in).'
';}).'
end each.

##2 start each+if:
'.LCRun::sec('winners', $cx, $in, true, function($cx, $in) {return '
 '.LCRun::ifv('test', $cx, $in, function($cx, $in) {return '
  Name:'.LCRun::enc('name', $cx, $in).', Value:'.LCRun::enc('value', $cx, $in).', This: '.LCRun::enc('', $cx, $in).', Test: '.LCRun::enc('test', $cx, $in).'

 ';}).'
';}).'
end each+if.

##3 start each+if+with:
'.LCRun::sec('winners', $cx, $in, true, function($cx, $in) {return '
 '.LCRun::ifv('test', $cx, $in, function($cx, $in) {return '
  '.LCRun::wi('people', $cx, $in, function($cx, $in) {return '
   Name:'.LCRun::enc('name', $cx, $in).', Value:'.LCRun::enc('value', $cx, $in).', This: '.LCRun::enc('', $cx, $in).', Test: '.LCRun::enc('test', $cx, $in).'

  ';}).'
 ';}).'
';}).'
end each+if+with.

##4 start each+with+if:
'.LCRun::sec('winners', $cx, $in, true, function($cx, $in) {return '
 '.LCRun::wi('people', $cx, $in, function($cx, $in) {return '
  '.LCRun::ifv('test', $cx, $in, function($cx, $in) {return '
   Name:'.LCRun::enc('name', $cx, $in).', Value:'.LCRun::enc('value', $cx, $in).', This: '.LCRun::enc('', $cx, $in).', Test: '.LCRun::enc('test', $cx, $in).'

  ';}).'
 ';}).'
';}).'
end each+with+if.
';
}
?>