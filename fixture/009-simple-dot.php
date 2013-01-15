<?php return function ($in) {
    $cx = Array(
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.(($in['winner']['name'] === true) ? 'true' : htmlentities($in['winner']['name'], ENT_QUOTES)).', you have just won $'.(($in['winner']['value'] === true) ? 'true' : htmlentities($in['winner']['value'], ENT_QUOTES)).'!
We have $'.(($in['award']['first']['value'] === true) ? 'true' : htmlentities($in['award']['first']['value'], ENT_QUOTES)).' for '.(($in['award']['first']['name'] === true) ? 'true' : htmlentities($in['award']['first']['name'], ENT_QUOTES)).' award!!
';
}
?>