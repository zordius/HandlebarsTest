<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),
'funcs' => Array(
    'ifvar' => function ($var, $cx, $in) {
        $v = $cx['funcs']['val']($var, $cx, $in);
        return !is_null($v) && ($v !== false) && ($v !== 0);
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
        $v = $cx['funcs']['val']($var, $cx, $in);
        return is_null($v) || ($v === false);
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
            $cx['scopes'][] = $in;
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
    return '<div class="yui3-u-1-2 member-status">
 <ul class="h-list">
 '.$cx['funcs']['wi']('login_status', $cx, $in, function($cx, $in) {return '
  '.($cx['funcs']['ifvar']('is_login', $cx, $in) ? ('
   <li><a href="'.$cx['funcs']['enc']('edit_account_link', $cx, $in).'">Hello '.$cx['funcs']['enc']('username', $cx, $in).'</a></li>
   <li><a href="'.$cx['funcs']['enc']('logut_link', $cx, $in).'">Logout</a></li>
  ') : '').'
  '.(!$cx['funcs']['ifvar']('is_login', $cx, $in) ? ('
   <li>New User? <a href="'.$cx['funcs']['enc']('register_link', $cx, $in).'">Register Now</a></li>
   <li><a href="'.$cx['funcs']['enc']('login_link', $cx, $in).'">Login</a></li>
  ') : '').'
~WITH
  '.$cx['funcs']['wi']('test', $cx, $in, function($cx, $in) {return '
~TEST~
   '.$cx['funcs']['enc']('testval', $cx, $in).'
   '.$cx['funcs']['raw']('testval', $cx, $in).'
~IF~
   '.($cx['funcs']['ifvar']('testval', $cx, $in) ? ('YES') : '').'
   '.(!$cx['funcs']['ifvar']('testval', $cx, $in) ? ('NO') : '').'
~SEC~
   '.$cx['funcs']['sec']('test2', $cx, $in, false, function($cx, $in) {return '
    '.$cx['funcs']['enc']('loopval', $cx, $in).'
   ';}).'
~EACH~
   '.$cx['funcs']['sec']('test3', $cx, $in, true, function($cx, $in) {return '
    '.$cx['funcs']['enc']('loopval', $cx, $in).'
   ';}).'
~END~
  ';}).'
WITH~
 ';}).'
_WITH PATH_
 '.$cx['funcs']['wi']('login_status.test', $cx, $in, function($cx, $in) {return '
XTEST: '.$cx['funcs']['enc']('testval', $cx, $in).' - '.$cx['funcs']['raw']('textval', $cx, $in).'
IF: '.($cx['funcs']['ifvar']('testval', $cx, $in) ? ('YES~') : '').''.(!$cx['funcs']['ifvar']('testval', $cx, $in) ? ('NO!') : '').'
SECTION::'.$cx['funcs']['sec']('test2', $cx, $in, false, function($cx, $in) {return ' - loop: '.$cx['funcs']['enc']('loopval', $cx, $in).'';}).'
EACH::'.$cx['funcs']['sec']('test3', $cx, $in, true, function($cx, $in) {return '	lp:'.$cx['funcs']['raw']('loopval', $cx, $in).'';}).'
END!
 ';}).'
 </ul>
</div>
';
}
?>