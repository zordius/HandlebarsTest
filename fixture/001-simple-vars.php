<?php return function ($in) {
    $cx = Array(
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.(($in['name'] === true) ? 'true' : htmlentities($in['name'], ENT_QUOTES)).', you have just won $'.(($in['value'] === true) ? 'true' : htmlentities($in['value'], ENT_QUOTES)).'!
This is next line.'.(($in['empty_var'] === true) ? 'true' : htmlentities($in['empty_var'], ENT_QUOTES)).'
';
}
?>