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

. '.LCRun2::encq((is_array($in) ? $in['!'] : null), $cx).' !!
. KAKA '.LCRun2::encq((is_array($in) ? $in['! # % & ( ) * + , . / ; < = > @ [ \ ^ ` { | } ~'] : null), $cx).'
. K '.LCRun2::encq((is_array($in) ? $in['!['] : null), $cx).' X
. Hello '.LCRun2::encq((is_array($in['winners']['0']) ? $in['winners']['0']['name'] : null), $cx).' !! Won $'.LCRun2::encq((is_array($in['winners']['0']) ? $in['winners']['0']['value'] : null), $cx).' now~~
. Hello '.LCRun2::encq((is_array($in['winners']['1']) ? $in['winners']['1']['name'] : null), $cx).' !! Won $'.LCRun2::encq((is_array($in['winners']['1']) ? $in['winners']['1']['value'] : null), $cx).' later~~
. No '.LCRun2::encq((is_array($in['winners']['!']) ? $in['winners']['!']['name'] : null), $cx).' !!
';
}
?>