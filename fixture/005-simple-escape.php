<?php return function ($in) {
    $cx = Array(
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.(($in['name'] === true) ? 'true' : htmlentities($in['name'], ENT_QUOTES)).', you have just won $'.(($in['value'] === true) ? 'true' : htmlentities($in['value'], ENT_QUOTES)).'!
Hello original '.(($in['name'] === true) ? 'true' : $in['name']).' , the value is '.(($in['value'] === true) ? 'true' : $in['value']).'
';
}
?>