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
start each:
'.LCRun::sec('winners', $cx, $in, true, function($cx, $in) {return '
  Name:'.LCRun::enc('name', $cx, $in).', Value:'.LCRun::enc('value', $cx, $in).'
-Name:'.LCRun::enc('name', $cx, $in).', Value:'.LCRun::enc('value', $cx, $in).'
ParentName: '.LCRun::enc('name', $cx, $in).', ParentValue: '.LCRun::enc('value', $cx, $in).'
RootName: { {name}}, RootValue: { {value}}


';}).'
end each.

start each+if:
'.LCRun::sec('winners', $cx, $in, true, function($cx, $in) {return '
 '.((LCRun::ifvar('test', $cx, $in)) ? '
  Name:'.LCRun::enc('name', $cx, $in).', Value:'.LCRun::enc('value', $cx, $in).'
-Name:'.LCRun::enc('name', $cx, $in).', Value:'.LCRun::enc('value', $cx, $in).'
ParentName: '.LCRun::enc('name', $cx, $in).', ParentValue: '.LCRun::enc('value', $cx, $in).'
RootName: { {name}}, RootValue: { {value}}


 ' : '').'
';}).'
end each+if.

start each+if+with:
'.LCRun::sec('winners', $cx, $in, true, function($cx, $in) {return '
 '.((LCRun::ifvar('test', $cx, $in)) ? '
  '.LCRun::wi('people', $cx, $in, function($cx, $in) {return '
   Name:'.LCRun::enc('name', $cx, $in).', Value:'.LCRun::enc('value', $cx, $in).'
-Name:'.LCRun::enc('name', $cx, $in).', Value:'.LCRun::enc('value', $cx, $in).'
ParentName: '.LCRun::enc('name', $cx, $in).', ParentValue: '.LCRun::enc('value', $cx, $in).'
RootName: { {name}}, RootValue: { {value}}


  ';}).'
 ' : '').'
';}).'
end each+if+with.

start each+with+if:
'.LCRun::sec('winners', $cx, $in, true, function($cx, $in) {return '
 '.LCRun::wi('people', $cx, $in, function($cx, $in) {return '
  '.((LCRun::ifvar('test', $cx, $in)) ? '
   Name:'.LCRun::enc('name', $cx, $in).', Value:'.LCRun::enc('value', $cx, $in).'
-Name:'.LCRun::enc('name', $cx, $in).', Value:'.LCRun::enc('value', $cx, $in).'
ParentName: '.LCRun::enc('name', $cx, $in).', ParentValue: '.LCRun::enc('value', $cx, $in).'
RootName: { {name}}, RootValue: { {value}}


  ' : '').'
 ';}).'
';}).'
end each+with+if.
';
}
?>