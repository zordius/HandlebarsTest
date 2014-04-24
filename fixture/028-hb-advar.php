<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
            'debug' => $debugopt,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!

. '.LCRun2::encq(((is_array($in) && isset($in['!'])) ? $in['!'] : null), $cx).' !!
. KAKA '.LCRun2::encq(((is_array($in) && isset($in['! # % & ( ) * + , . / ; < = > @ [ \ ^ ` { | } ~'])) ? $in['! # % & ( ) * + , . / ; < = > @ [ \ ^ ` { | } ~'] : null), $cx).'
. K '.LCRun2::encq(((is_array($in) && isset($in['!['])) ? $in['!['] : null), $cx).' X
. Hello '.LCRun2::encq(((is_array($in['winners']['0']) && isset($in['winners']['0']['name'])) ? $in['winners']['0']['name'] : null), $cx).' !! Won $'.LCRun2::encq(((is_array($in['winners']['0']) && isset($in['winners']['0']['value'])) ? $in['winners']['0']['value'] : null), $cx).' now~~
. Hello '.LCRun2::encq(((is_array($in['winners']['1']) && isset($in['winners']['1']['name'])) ? $in['winners']['1']['name'] : null), $cx).' !! Won $'.LCRun2::encq(((is_array($in['winners']['1']) && isset($in['winners']['1']['value'])) ? $in['winners']['1']['value'] : null), $cx).' later~~
. No '.LCRun2::encq(((is_array($in['winners']['!']) && isset($in['winners']['!']['name'])) ? $in['winners']['!']['name'] : null), $cx).' !!
';
}
?>