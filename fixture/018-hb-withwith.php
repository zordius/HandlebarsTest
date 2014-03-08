<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(            'helper1' => function($url, $txt) {
                $u = ($url !== null) ? $url : 'undefined';
                $t = ($txt !== null) ? $txt : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>";
            },
            'helper2' => function($hash) {
                $u = isset($hash['url']) ? $hash['url'] : 'undefined';
                $t = isset($hash['text']) ? $hash['text'] : 'undefined';
                $x = isset($hash['ur"l']) ? $hash['ur"l'] : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>({$x})";
            },
),
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

    );
    return '<div class="yui3-u-1-2 member-status">
 <ul class="h-list">
 '.LCRun2::wi((is_array($in) ? $in['login_status'] : null), $cx, $in, function($cx, $in) {return '
  '.((LCRun2::ifvar((is_array($in) ? $in['is_login'] : null))) ? '
   <li><a href="'.LCRun2::encq((is_array($in) ? $in['edit_account_link'] : null), $cx).'">Hello '.LCRun2::encq((is_array($in) ? $in['username'] : null), $cx).'</a></li>
   <li><a href="'.LCRun2::encq((is_array($in) ? $in['logut_link'] : null), $cx).'">Logout</a></li>
  ' : '').'
  '.((!LCRun2::ifvar((is_array($in) ? $in['is_login'] : null))) ? '
   <li>New User? <a href="'.LCRun2::encq((is_array($in) ? $in['register_link'] : null), $cx).'">Register Now</a></li>
   <li><a href="'.LCRun2::encq((is_array($in) ? $in['login_link'] : null), $cx).'">Login</a></li>
  ' : '').'
~WITH
  '.LCRun2::wi((is_array($in) ? $in['test'] : null), $cx, $in, function($cx, $in) {return '
~TEST~
   '.LCRun2::encq((is_array($in) ? $in['testval'] : null), $cx).'
   '.LCRun2::raw((is_array($in) ? $in['testval'] : null), $cx).'
~IF~
   '.((LCRun2::ifvar((is_array($in) ? $in['testval'] : null))) ? 'YES' : '').'
   '.((!LCRun2::ifvar((is_array($in) ? $in['testval'] : null))) ? 'NO' : '').'
~SEC~
   '.LCRun2::sec((is_array($in) ? $in['test2'] : null), $cx, $in, false, function($cx, $in) {return '
    '.LCRun2::encq((is_array($in) ? $in['loopval'] : null), $cx).'
   ';}).'
~EACH~
   '.LCRun2::sec((is_array($in) ? $in['test3'] : null), $cx, $in, true, function($cx, $in) {return '
    '.LCRun2::encq((is_array($in) ? $in['loopval'] : null), $cx).'
   ';}).'
~END~
  ';}).'
WITH~
 ';}).'
_WITH PATH_
 '.LCRun2::wi((is_array($in['login_status']) ? $in['login_status']['test'] : null), $cx, $in, function($cx, $in) {return '
XTEST: '.LCRun2::encq((is_array($in) ? $in['testval'] : null), $cx).' - '.LCRun2::raw((is_array($in) ? $in['textval'] : null), $cx).'
IF: '.((LCRun2::ifvar((is_array($in) ? $in['testval'] : null))) ? 'YES~' : '').''.((!LCRun2::ifvar((is_array($in) ? $in['testval'] : null))) ? 'NO!' : '').'
SECTION::'.LCRun2::sec((is_array($in) ? $in['test2'] : null), $cx, $in, false, function($cx, $in) {return ' - loop: '.LCRun2::encq((is_array($in) ? $in['loopval'] : null), $cx).'';}).'
EACH::'.LCRun2::sec((is_array($in) ? $in['test3'] : null), $cx, $in, true, function($cx, $in) {return '	lp:'.LCRun2::raw((is_array($in) ? $in['loopval'] : null), $cx).'';}).'
END!
 ';}).'
 </ul>
</div>
';
}
?>