<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
include this:
    Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
This is next line.'.LCRun2::encq(((is_array($in) && isset($in['empty_var'])) ? $in['empty_var'] : null), $cx).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!

end include.
section partial....
'.LCRun2::sec(((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $cx, $in, false, function($cx, $in) {return '
  Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
This is next line.'.LCRun2::encq(((is_array($in) && isset($in['empty_var'])) ? $in['empty_var'] : null), $cx).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!

';}).'
end section.

Winners: '.LCRun2::sec(((is_array($in) && isset($in['winners'])) ? $in['winners'] : null), $cx, $in, false, function($cx, $in) {return ''.LCRun2::encq($in, $cx).'('.LCRun2::raw($in, $cx).') = '.LCRun2::encq($in, $cx).'('.LCRun2::raw($in, $cx).')';}).'

Partial1:Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
This is next line.'.LCRun2::encq(((is_array($in) && isset($in['empty_var'])) ? $in['empty_var'] : null), $cx).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!

Partial2:Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
This is next line.'.LCRun2::encq(((is_array($in) && isset($in['empty_var'])) ? $in['empty_var'] : null), $cx).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!

Partial3:Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
This is next line.'.LCRun2::encq(((is_array($in) && isset($in['empty_var'])) ? $in['empty_var'] : null), $cx).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!

Partial4:Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
This is next line.'.LCRun2::encq(((is_array($in) && isset($in['empty_var'])) ? $in['empty_var'] : null), $cx).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!

Partial5:Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
This is next line.'.LCRun2::encq(((is_array($in) && isset($in['empty_var'])) ? $in['empty_var'] : null), $cx).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!

Partial6:Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
This is next line.'.LCRun2::encq(((is_array($in) && isset($in['empty_var'])) ? $in['empty_var'] : null), $cx).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!

';
}
?>