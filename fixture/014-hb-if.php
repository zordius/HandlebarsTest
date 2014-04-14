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
    return 'Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
'.((LCRun2::ifvar(((is_array($in) && isset($in['test'])) ? $in['test'] : null))) ? '
Yes! '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' is '.LCRun2::encq(((is_array($in) && isset($in['gender'])) ? $in['gender'] : null), $cx).'
' : '').'
'.((LCRun2::ifvar(((is_array($in) && isset($in['test'])) ? $in['test'] : null))) ? '
2nd If, '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' is '.LCRun2::raw(((is_array($in) && isset($in['gender'])) ? $in['gender'] : null), $cx).'
' : '
Else test, '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' is '.LCRun2::encq(((is_array($in) && isset($in['gender'])) ? $in['gender'] : null), $cx).'
').'
-TEST PATH-
'.((LCRun2::ifvar(((is_array($in['test']) && isset($in['test']['name'])) ? $in['test']['name'] : null))) ? '
Yes! '.LCRun2::encq(((is_array($in) && isset($in['subname'])) ? $in['subname'] : null), $cx).'
' : '
No! '.LCRun2::encq(((is_array($in) && isset($in['subname'])) ? $in['subname'] : null), $cx).'
').'
'.LCRun2::encq(((is_array($in) && isset($in['end'])) ? $in['end'] : null), $cx).'
';
}
?>