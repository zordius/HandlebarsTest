<?php

function warn ($str) {
    file_put_contents('php://stderr', "$str\n");
}

function prepare_tmpl($name, $file) {
    global $test_tmpl, $test_method;

    $tmpl_txt = file_get_contents($file);
    warn("\n# Template: $tmpl_txt\n");

    switch ($name) {
    case 'handlebars.php':
    case 'mustache-php':
    case 'mustache.php':
        require_once('cloned/mustache.php/src/Mustache/Autoloader.php');
        Mustache_Autoloader::register();
        $m = new Mustache_Engine;
        $test_tmpl = $m->loadTemplate($tmpl_txt);
        $test_method = 'render';
        break;
    default:
        die("ERROR!! Do not support this lib: $name !!\n");
    }
}

?>
