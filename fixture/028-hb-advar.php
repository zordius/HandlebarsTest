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
'funcs' => Array(
    'ifvar' => function ($v) {
        return !is_null($v) && ($v !== false) && ($v !== 0) && ($v !== '') && (is_array($v) ? (count($v) > 0) : true);
    },
    'ifv' => function ($v, $cx, $in, $truecb, $falsecb = null) {
        $ret = '';
        if ($cx['funcs']['ifvar']($v)) {
            if ($truecb) {
                $cx['scopes'][] = $in;
                $ret = $truecb($cx, $in);
                array_pop($cx['scopes']);
            }
        } else {
            if ($falsecb) {
                $cx['scopes'][] = $in;
                $ret = $falsecb($cx, $in);
                array_pop($cx['scopes']);
            }
        }
        return $ret;
    },
    'unl' => function ($var, $cx, $in, $truecb, $falsecb = null) {
        return $cx['funcs']['ifv']($var, $cx, $in, $falsecb, $truecb);
    },
    'isec' => function ($v) {
        return is_null($v) || ($v === false);
    },
    'raw' => function ($v, $cx, $loop = false) {
        if ($v === true) {
            if ($cx['flags']['jstrue']) {
                return 'true';
            }
        }

        if ($loop && ($v === false)) {
            if ($cx['flags']['jstrue']) {
                return 'false';
            }
        }

        if (is_array($v)) {
            if ($cx['flags']['jsobj']) {
                if (count(array_diff_key($v, array_keys(array_keys($v)))) > 0) {
                    return '[object Object]';
                } else {
                    $ret = Array();
                    foreach ($v as $k => $vv) {
                        $ret[] = $cx['funcs']['raw']($vv, $cx, true);
                    }
                    return join(',', $ret);
                }
            }
        }

        return $v;
    },
    'enc' => function ($var, $cx) {
        return htmlentities($cx['funcs']['raw']($var, $cx), ENT_QUOTES, 'UTF-8');
    },
    'encq' => function ($var, $cx) {
        return preg_replace('/&#039;/', '&#x27;', htmlentities($cx['funcs']['raw']($var, $cx), ENT_QUOTES, 'UTF-8'));
    },
    'sec' => function ($v, &$cx, $in, $each, $cb, $inv = null) {
        $isary = is_array($v);
        $loop = $each;
        if ($isary && $inv !== null && count($v) === 0) {
            $cx['scopes'][] = $in;
            $ret = $inv($cx, $v);
            array_pop($cx['scopes']);
            return $ret;
        }
        if (!$loop && $isary) {
            $loop = (count(array_diff_key($v, array_keys(array_keys($v)))) == 0);
        }
        if ($loop && $isary) {
            if ($each) {
                $is_obj = count(array_diff_key($v, array_keys(array_keys($v)))) > 0;
            } else {
                $is_obj = false;
            }
            $ret = Array();
            $cx['scopes'][] = $in;
            $i = 0;
            foreach ($v as $index => $raw) {
                if ($is_obj) {
                    $cx['sp_vars']['key'] = $index;
                    $cx['sp_vars']['index'] = $i;
                    $i++;
                } else {
                    $cx['sp_vars']['index'] = $index;
                }
                $ret[] = $cb($cx, $raw);
            }
            if ($is_obj) {
                unset($cx['sp_vars']['key']);
            }
            unset($cx['sp_vars']['index']);
            array_pop($cx['scopes']);
            return join('', $ret);
        }
        if ($each) {
            if ($inv !== null) {
                $cx['scopes'][] = $in;
                $ret = $inv($cx, $v);
                array_pop($cx['scopes']);
                return $ret;
            }
            return '';
        }
        if ($isary) {
            $cx['scopes'][] = $v;
            $ret = $cb($cx, $v);
            array_pop($cx['scopes']);
            return $ret;
        }

        if ($v === true) {
            return $cb($cx, $in);
        } 

        if (is_string($v)) {
            return $cb($cx, Array());
        }

        if (!is_null($v) && ($v !== false)) {
            return $cb($cx, $v);
        }

        if ($inv !== null) {
            $cx['scopes'][] = $in;
            $ret = $inv($cx, $v);
            array_pop($cx['scopes']);
            return $ret;
        }

        return '';
    },
    'wi' => function ($v, &$cx, $in, $cb) {
        if (($v === false) || ($v === null)) {
            return '';
        }
        $cx['scopes'][] = $in;
        $ret = $cb($cx, $v);
        array_pop($cx['scopes']);
        return $ret;
    },
    'ch' => function ($ch, $vars, $op, &$cx, $named = false) {
        $args = Array();
        foreach ($vars as $i => $v) {
            $args[$i] = $cx['funcs']['raw']($v, $cx);
        }

        $r = call_user_func_array($cx['helpers'][$ch], $named ? Array($args) : $args);

        if (is_array($r)) {
            if (isset($r[1])) {
                if ($r[1]) {
                    $op = $r[1];
                } else {
                    return $r;
                }
            }
            $r = $r[0];
        }

        switch ($op) {
            case 'enc': 
                return htmlentities($r, ENT_QUOTES, 'UTF-8');
            case 'encq':
                return preg_replace('/&#039;/', '&#x27;', htmlentities($r, ENT_QUOTES, 'UTF-8'));
            case 'raw':
            default:
                return $r;
        }
    },
    'bch' => function ($ch, $vars, &$cx, $in, $cb) {
        $args = Array();
        foreach ($vars as $i => $v) {
            $args[$i] = $cx['funcs']['raw']($v, $cx);
        }

        $r = call_user_func($cx['blockhelpers'][$ch], $in, $args);
        if (is_null($r)) {
            return '';
        }

        $cx['scopes'][] = $in;
        $ret = $cb($cx, $r);
        array_pop($cx['scopes']);
        return $ret;
    },
)

    );
    ob_start();echo 'Hello ',$cx['funcs']['encq'](((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx),', you have just won $',$cx['funcs']['encq'](((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx),'!

. ',$cx['funcs']['encq'](((is_array($in) && isset($in['!'])) ? $in['!'] : null), $cx),' !!
. KAKA ',$cx['funcs']['encq'](((is_array($in) && isset($in['! # % & ( ) * + , . / ; < = > @ [ \ ^ ` { | } ~'])) ? $in['! # % & ( ) * + , . / ; < = > @ [ \ ^ ` { | } ~'] : null), $cx),'
. K ',$cx['funcs']['encq'](((is_array($in) && isset($in['!['])) ? $in['!['] : null), $cx),' X
. Hello ',$cx['funcs']['encq'](((is_array($in['winners']['0']) && isset($in['winners']['0']['name'])) ? $in['winners']['0']['name'] : null), $cx),' !! Won $',$cx['funcs']['encq'](((is_array($in['winners']['0']) && isset($in['winners']['0']['value'])) ? $in['winners']['0']['value'] : null), $cx),' now~~
. Hello ',$cx['funcs']['encq'](((is_array($in['winners']['1']) && isset($in['winners']['1']['name'])) ? $in['winners']['1']['name'] : null), $cx),' !! Won $',$cx['funcs']['encq'](((is_array($in['winners']['1']) && isset($in['winners']['1']['value'])) ? $in['winners']['1']['value'] : null), $cx),' later~~
. No ',$cx['funcs']['encq'](((is_array($in['winners']['!']) && isset($in['winners']['!']['name'])) ? $in['winners']['!']['name'] : null), $cx),' !!
';return ob_get_clean();
}
?>