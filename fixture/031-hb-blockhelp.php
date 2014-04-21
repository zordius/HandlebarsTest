<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(            'helper3' => function($cx, $args) {
                return Array('test1', 'test2', 'test3');
            },
            'helper4' => function($cx, $args) {
                if (isset($args['val']) && is_array($cx)) {
                    $cx['helper4_value'] = $args['val'] % 2;
                    return $cx;
                }
                if (isset($args['odd'])) {
                    return Array(1,3,5,7,9);
                }
            },
),
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

. Test 1: ',$cx['funcs']['bch']('helper3', Array(((is_array($in) && isset($in['people'])) ? $in['people'] : null)), $cx, $in, function($cx, $in) {echo '<li>',$cx['funcs']['encq'](((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx),' -> ',$cx['funcs']['encq'](((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx),'</li>';}),'

. Test 2: ',$cx['funcs']['bch']('helper4', Array('people'), $cx, $in, function($cx, $in) {echo '
  <li>',$cx['funcs']['encq'](((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx),' -> ',$cx['funcs']['encq'](((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx),'</li>
';}),'

. Test 3: ',$cx['funcs']['sec'](((is_array($in) && isset($in['people'])) ? $in['people'] : null), $cx, $in, true, function($cx, $in) {echo '
  NOTE A: ',$cx['funcs']['encq'](((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx),' : ',$cx['funcs']['encq']($in, $cx),' != ',$cx['funcs']['encq']($cx['scopes'][count($cx['scopes'])-1], $cx),'
S~',$cx['funcs']['encq']($in, $cx),'~',$cx['funcs']['bch']('helper3', Array(), $cx, $in, function($cx, $in) {echo '
  NOTE B: ',$cx['funcs']['encq'](((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx),' : ',$cx['funcs']['encq']($in, $cx),' != ',$cx['funcs']['encq']($cx['scopes'][count($cx['scopes'])-1], $cx),'
';}),'E
';}),'

. Test 4: ',$cx['funcs']['bch']('helper3', Array(), $cx, $in, function($cx, $in) {echo 'ABC';}),'

. Test 5: ',$cx['funcs']['bch']('helper4', Array('val'=>'123','odd'=>'1'), $cx, $in, function($cx, $in) {echo '~~~',$cx['funcs']['encq']($in, $cx),'~~~';}),'

. Test 6: ',$cx['funcs']['bch']('helper4', Array('val'=>((is_array($in) && isset($in['people'])) ? $in['people'] : null),'odd'=>((is_array($in) && isset($in['test'])) ? $in['test'] : null)), $cx, $in, function($cx, $in) {echo 'TRY~~~',$cx['funcs']['encq']($in, $cx),' , ',$cx['funcs']['encq']($cx['scopes'][count($cx['scopes'])-1], $cx),' ~~~';}),'

. Test 7: ',$cx['funcs']['sec'](((is_array($in) && isset($in['people'])) ? $in['people'] : null), $cx, $in, true, function($cx, $in) {echo ' 
 OK! 1 ',$cx['funcs']['bch']('helper3', Array('val'=>((is_array($in) && isset($in['name'])) ? $in['name'] : null),'odd'=>((is_array($in) && isset($in['value'])) ? $in['value'] : null)), $cx, $in, function($cx, $in) {echo 'TRY ?!??!!~~~',$cx['funcs']['encq']($in, $cx),' , ',$cx['funcs']['encq']($cx['scopes'][count($cx['scopes'])-1], $cx),' ~~~';}),'
 OK! ',$cx['funcs']['bch']('helper4', Array('val'=>((is_array($in) && isset($in['name'])) ? $in['name'] : null),'odd'=>((is_array($in) && isset($in['value'])) ? $in['value'] : null)), $cx, $in, function($cx, $in) {echo 'TRY ?!~~~',$cx['funcs']['encq']($in, $cx),' , ',$cx['funcs']['encq']($cx['scopes'][count($cx['scopes'])-1], $cx),' ~~~';}),'
';}),'
';return ob_get_clean();
}
?>