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
    return 'Hello '.LCRun3::encq($cx, ((is_array($in) && isset($in['name'])) ? $in['name'] : null)).', you have just won $'.LCRun3::encq($cx, ((is_array($in) && isset($in['value'])) ? $in['value'] : null)).'!

. '.LCRun3::encq($cx, ((is_array($in) && isset($in['!'])) ? $in['!'] : null)).' !!
. KAKA '.LCRun3::encq($cx, ((is_array($in) && isset($in['! # % & ( ) * + , . / ; < = > @ [ \ ^ ` { | } ~'])) ? $in['! # % & ( ) * + , . / ; < = > @ [ \ ^ ` { | } ~'] : null)).'
. K '.LCRun3::encq($cx, ((is_array($in) && isset($in['!['])) ? $in['!['] : null)).' X
. Hello '.LCRun3::encq($cx, ((is_array($in['winners']['0']) && isset($in['winners']['0']['name'])) ? $in['winners']['0']['name'] : null)).' !! Won $'.LCRun3::encq($cx, ((is_array($in['winners']['0']) && isset($in['winners']['0']['value'])) ? $in['winners']['0']['value'] : null)).' now~~
. Hello '.LCRun3::encq($cx, ((is_array($in['winners']['1']) && isset($in['winners']['1']['name'])) ? $in['winners']['1']['name'] : null)).' !! Won $'.LCRun3::encq($cx, ((is_array($in['winners']['1']) && isset($in['winners']['1']['value'])) ? $in['winners']['1']['value'] : null)).' later~~
. No '.LCRun3::encq($cx, ((is_array($in['winners']['!']) && isset($in['winners']['!']['name'])) ? $in['winners']['!']['name'] : null)).' !!
';
}
?>