<?php return function ($in, $debugopt = 1) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => false,
            'jsobj' => false,
            'spvar' => true,
            'prop' => false,
            'method' => false,
            'debug' => $debugopt,
        ),
        'helpers' => Array(            'helper1' => function($args, $named) {
    $u = (isset($args[0])) ? $args[0] : 'undefined';
    $t = (isset($args[1])) ? $args[1] : 'undefined';
    return "<a href=\"{$u}\">{$t}</a>";
},
),
        'blockhelpers' => Array(),
        'hbhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),
'funcs' => Array(
    'ch' => function ($cx, $ch, $vars, $op) {
        return $cx['funcs']['chret'](call_user_func_array($cx['helpers'][$ch], $vars), $op);
    },
    'chret' => function ($ret, $op) {
        if (is_array($ret)) {
            if (isset($ret[1])) {
                if ($ret[1]) {
                    $op = $ret[1];
                } else {
                    return $ret[0];
                }
            }
            $ret = $ret[0];
        }

        switch ($op) {
            case 'enc': 
                return htmlentities($ret, ENT_QUOTES, 'UTF-8');
            case 'encq':
                return preg_replace('/&#039;/', '&#x27;', htmlentities($ret, ENT_QUOTES, 'UTF-8'));
            case 'raw':
            default:
                return $ret;
        }
    },
)

    );
    return ''.$cx['funcs']['ch']($cx, 'helper1', Array(Array(((is_array($in) && isset($in['url'])) ? $in['url'] : null),((is_array($in) && isset($in['(helper1'])) ? $in['(helper1'] : null),((is_array($in) && isset($in['url2'])) ? $in['url2'] : null),((is_array($in) && isset($in['text)'])) ? $in['text)'] : null)),Array()), 'raw').'

';
}
?>