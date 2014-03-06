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
 '.LCRun2::wi(Array('login_status'), $cx, $in, function($cx, $in) {return '
  '.((LCRun2::ifvar(Array('is_login'), $cx, $in)) ? '
   <li><a href="'.LCRun2::encq(Array('edit_account_link'), $cx, $in).'">Hello '.LCRun2::encq(Array('username'), $cx, $in).'</a></li>
   <li><a href="'.LCRun2::encq(Array('logut_link'), $cx, $in).'">Logout</a></li>
  ' : '').'
  '.((!LCRun2::ifvar(Array('is_login'), $cx, $in)) ? '
   <li>New User? <a href="'.LCRun2::encq(Array('register_link'), $cx, $in).'">Register Now</a></li>
   <li><a href="'.LCRun2::encq(Array('login_link'), $cx, $in).'">Login</a></li>
  ' : '').'
~WITH
  '.LCRun2::wi(Array('test'), $cx, $in, function($cx, $in) {return '
~TEST~
   '.LCRun2::encq(Array('testval'), $cx, $in).'
   '.LCRun2::raw(Array('testval'), $cx, $in).'
~IF~
   '.((LCRun2::ifvar(Array('testval'), $cx, $in)) ? 'YES' : '').'
   '.((!LCRun2::ifvar(Array('testval'), $cx, $in)) ? 'NO' : '').'
~SEC~
   '.LCRun2::sec(Array('test2'), $cx, $in, false, function($cx, $in) {return '
    '.LCRun2::encq(Array('loopval'), $cx, $in).'
   ';}).'
~EACH~
   '.LCRun2::sec(Array('test3'), $cx, $in, true, function($cx, $in) {return '
    '.LCRun2::encq(Array('loopval'), $cx, $in).'
   ';}).'
~END~
  ';}).'
WITH~
 ';}).'
_WITH PATH_
 '.LCRun2::wi(Array('login_status','test'), $cx, $in, function($cx, $in) {return '
XTEST: '.LCRun2::encq(Array('testval'), $cx, $in).' - '.LCRun2::raw(Array('textval'), $cx, $in).'
IF: '.((LCRun2::ifvar(Array('testval'), $cx, $in)) ? 'YES~' : '').''.((!LCRun2::ifvar(Array('testval'), $cx, $in)) ? 'NO!' : '').'
SECTION::'.LCRun2::sec(Array('test2'), $cx, $in, false, function($cx, $in) {return ' - loop: '.LCRun2::encq(Array('loopval'), $cx, $in).'';}).'
EACH::'.LCRun2::sec(Array('test3'), $cx, $in, true, function($cx, $in) {return '	lp:'.LCRun2::raw(Array('loopval'), $cx, $in).'';}).'
END!
 ';}).'
 </ul>
</div>
';
}
?>