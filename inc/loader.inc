<?php

if (file_exists(__DIR__ . '/../cloned/lightncandy/src/loader.php')) {
    require_once(__DIR__ . '/../cloned/lightncandy/src/loader.php');
    // mock class to make legacy code works
    class LightnCandy extends \LightnCandy\LightnCandy {};
    $lc_version = '>=89';
    if (defined('LightnCandy\\FLAG_BARE')) {
        $lc_version = '89';
    }
} else if (file_exists(__DIR__ . '/../cloned/lightncandy/src/lightncandy.inc')) {
    require_once(__DIR__ . '/../cloned/lightncandy/src/lightncandy.inc');
    $lc_version = '<9';
} else {
    $lc_version = '<=23';
    require_once(__DIR__ . '/../cloned/lightncandy/src/lightncandy.php');
}

?>
