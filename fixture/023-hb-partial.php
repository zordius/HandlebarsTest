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
),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
each partial....
'.LCRun2::sec(Array('winners'), $cx, $in, true, function($cx, $in) {return '
  Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
This is next line.'.LCRun2::encq(Array('empty_var'), $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

--
  <div class="yui3-u-1-2 member-status">
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
 ';}).'
  <li><a>About Auction</a></li>
 </ul>
</div>

';}).'
end each.

if + with + partial:
'.((LCRun2::ifvar(Array('test'), $cx, $in)) ? '
w>'.LCRun2::wi(Array('people'), $cx, $in, function($cx, $in) {return '
  p>Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
This is next line.'.LCRun2::encq(Array('empty_var'), $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!
<
<w';}).'
' : '').'
';
}
?>