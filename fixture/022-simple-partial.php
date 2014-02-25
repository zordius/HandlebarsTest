<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
include this:
    Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
This is next line.'.LCRun::encq('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!

end include.
section partial....
'.LCRun::sec('winners', $cx, $in, false, function($cx, $in) {return '
  Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
This is next line.'.LCRun::encq('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!

';}).'
end section.

Winners: '.LCRun::sec('winners', $cx, $in, false, function($cx, $in) {return ''.LCRun::encq('', $cx, $in).'('.LCRun::raw('', $cx, $in).') = '.LCRun::encq('', $cx, $in).'('.LCRun::raw('', $cx, $in).')';}).'

Partial1:Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
This is next line.'.LCRun::encq('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!

Partial2:Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
This is next line.'.LCRun::encq('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!

Partial3:Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
This is next line.'.LCRun::encq('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!

Partial4:Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
This is next line.'.LCRun::encq('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!

Partial5:Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
This is next line.'.LCRun::encq('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!

Partial6:Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
This is next line.'.LCRun::encq('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!

';
}
?>