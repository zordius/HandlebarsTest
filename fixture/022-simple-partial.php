<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array(),
        'path' => Array(),
        'parents' => Array(),
'funcs' => Array(
    'ifvar' => function ($var, $cx, $in) {
        $v = $cx['funcs']['val']($var, $cx, $in);
        return !is_null($v) && ($v !== false);
    },
    'ifv' => function ($var, $cx, $in, $truecb, $falsecb = null) {
        $v = $cx['funcs']['val']($var, $cx, $in);
        $ret = '';
        if (is_null($v) || ($v === false)) {
            if ($falsecb) {
                $cx['scopes'][] = $in;
                $ret = $falsecb($cx, $in);
                array_pop($cx['scopes']);
            }
        } else {
            if ($truecb) {
                $cx['scopes'][] = $in;
                $ret = $truecb($cx, $in);
                array_pop($cx['scopes']);
            }
        }
        return $ret;
    },
    'unl' => function ($var, $cx, $in, $truecb, $falsecb = null) {
        return $cx['funcs']['ifv']($var, $cx, $in, $falsecb, $truecb);
    },
    'isec' => function ($var, $cx, $in) {
        return !$cx['funcs']['ifvar']($var, $cx, $in);
    },
    'val' => function ($var, $cx, $in) {
        $levels = 0;
        $var = preg_replace_callback('/\\.\\.\\//', function($matches) use (&$levels) {
            $levels++;
            return '';
        }, $var);
        if ($levels > 0) {
            $pos = count($cx['scopes']) - $levels;
            if ($pos >= 0) {
                $in = $cx['scopes'][$pos];
            } else {
                return '';
            }
        }
        if (preg_match('/(.+?)\\.(.+)/', $var, $matched)) {
            if (array_key_exists($matched[1], $in)) {
                return $cx['funcs']['val']($matched[2], $cx, $in[$matched[1]]);
            } else {
                return null;
            }
        }
        return ($var === '') ? $in : (is_array($in) ? $in[$var] : null);
    },
    'raw' => function ($var, $cx, $in) {
        $v = $cx['funcs']['val']($var, $cx, $in);
        if ($v === true) {
            if ($cx['flags']['jstrue']) {
                return 'true';
            }
        } elseif (is_array($v)) {
            if ($cx['flags']['jsobj']) {
                if (count(array_diff_key($v, array_keys(array_keys($v)))) > 0) {
                    return '[object Object]';
                } else {
                    $ret = Array();
                    foreach ($v as $k => $vv) {
                        $ret[] = $cx['funcs']['raw']($k, $cx, $v);
                    }
                    return join(',', $ret);
                }
            }
        }
        return $v;
    },
    'enc' => function ($var, $cx, $in) {
        return htmlentities($cx['funcs']['raw']($var, $cx, $in), ENT_QUOTES);
    },
    'sec' => function ($var, &$cx, $in, $each, $cb) {
        $v = $cx['funcs']['val']($var, $cx, $in);
        $loop = $each;
        if (!$loop && is_array($v)) {
            $loop = (count(array_diff_key($v, array_keys(array_keys($v)))) == 0);
        }
        if ($loop) {
            $ret = Array();
            $cx['scopes'][] = $v;
            foreach ($v as $raw) {
                $ret[] = $cb($cx, $raw);
            }
            array_pop($cx['scopes']);
            return join('', $ret);
        }
        if ($each) {
            return '';
        }
        if (is_array($v)) {
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
        return '';
    },
    'wi' => function ($var, &$cx, $in, $cb) {
        $v = $cx['funcs']['val']($var, $cx, $in);
        if (($v === false) || ($v === null)) {
            return '';
        }
        $cx['scopes'][] = $in;
        $ret = $cb($cx, $v);
        array_pop($cx['scopes']);
        return $ret;
    },
)

    );
    return 'Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!
include this:
    Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!
This is next line.'.$cx['funcs']['enc']('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!

end include.
section partial....
'.$cx['funcs']['sec']('winners', $cx, $in, false, function($cx, $in) {return '
  Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!
This is next line.'.$cx['funcs']['enc']('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!

';}).'
end section.

Winners: '.$cx['funcs']['sec']('winners', $cx, $in, false, function($cx, $in) {return ''.$cx['funcs']['enc']('', $cx, $in).'('.$cx['funcs']['raw']('', $cx, $in).') = '.$cx['funcs']['enc']('', $cx, $in).'('.$cx['funcs']['raw']('', $cx, $in).')';}).'

Partial1:Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!
This is next line.'.$cx['funcs']['enc']('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!

Partial2:Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!
This is next line.'.$cx['funcs']['enc']('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!

Partial3:Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!
This is next line.'.$cx['funcs']['enc']('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!

Partial4:Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!
This is next line.'.$cx['funcs']['enc']('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!

Partial5:Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!
This is next line.'.$cx['funcs']['enc']('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!

Partial6:Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!
This is next line.'.$cx['funcs']['enc']('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.$cx['funcs']['enc']('name', $cx, $in).', you have just won $'.$cx['funcs']['enc']('value', $cx, $in).'!

';
}
?>