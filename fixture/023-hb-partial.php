<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
each partial....
'.LCRun::sec('winners', $cx, $in, true, function($cx, $in) {return '
  Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
This is next line.'.LCRun::encq('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!

--
  <div class="yui3-u-1-2 member-status">
 <ul class="h-list">
 '.LCRun::wi('login_status', $cx, $in, function($cx, $in) {return '
  '.((LCRun::ifvar('is_login', $cx, $in)) ? '
   <li><a href="'.LCRun::encq('edit_account_link', $cx, $in).'">Hello '.LCRun::encq('username', $cx, $in).'</a></li>
   <li><a href="'.LCRun::encq('logut_link', $cx, $in).'">Logout</a></li>
  ' : '').'
  '.((!LCRun::ifvar('is_login', $cx, $in)) ? '
   <li>New User? <a href="'.LCRun::encq('register_link', $cx, $in).'">Register Now</a></li>
   <li><a href="'.LCRun::encq('login_link', $cx, $in).'">Login</a></li>
  ' : '').'
 ';}).'
  <li><a>About Auction</a></li>
 </ul>
</div>

';}).'
end each.

if + with + partial:
'.((LCRun::ifvar('test', $cx, $in)) ? '
w>'.LCRun::wi('people', $cx, $in, function($cx, $in) {return '
  p>Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
This is next line.'.LCRun::encq('empty_var', $cx, $in).'中文
Test \on \'spacing in mustache: Hello '.LCRun::encq('name', $cx, $in).', you have just won $'.LCRun::encq('value', $cx, $in).'!
<
<w';}).'
' : '').'
';
}
?>