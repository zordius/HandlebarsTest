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
include this:
    Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
This is next line.'.LCRun::enc('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!

end include.
section partial....
'.LCRun::sec('winners', $cx, $in, false, function($cx, $in) {return '
  Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
This is next line.'.LCRun::enc('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!

';}).'
end section.

Winners: '.LCRun::sec('winners', $cx, $in, false, function($cx, $in) {return ''.LCRun::enc('', $cx, $in).'('.LCRun::raw('', $cx, $in).') = '.LCRun::enc('', $cx, $in).'('.LCRun::raw('', $cx, $in).')';}).'

Partial1:Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
This is next line.'.LCRun::enc('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!

Partial2:Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
This is next line.'.LCRun::enc('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!

Partial3:Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
This is next line.'.LCRun::enc('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!

Partial4:Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
This is next line.'.LCRun::enc('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!

Partial5:Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
This is next line.'.LCRun::enc('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!

Partial6:Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
This is next line.'.LCRun::enc('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!

';
}
?>