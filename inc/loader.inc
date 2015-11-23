<?php

if (file_exists(__DIR__ . '/../cloned/lightncandy/src/loader.php')) {
    require_once(__DIR__ . '/../cloned/lightncandy/src/loader.php');
    // mock class to make legacy code works
    class LightnCandy extends \LightnCandy\LightnCandy {};
} else if (file_exists(__DIR__ . '/../cloned/lightncandy/src/lightncandy.inc')) {
    require_once(__DIR__ . '/../cloned/lightncandy/src/lightncandy.inc');
} else {
    require_once(__DIR__ . '/../cloned/lightncandy/src/lightncandy.php');
}

?>
