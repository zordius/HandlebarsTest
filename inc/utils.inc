<?php

function warn ($str) {
    file_put_contents('php://stderr', "$str\n");
}

function prepare_tmpl($name, $file, $flag) {
    global $test_tmpl, $test_method;

    $tmpl_txt = file_get_contents($file);
    warn("\n### Template:\n$tmpl_txt\n");

    switch ($name) {
    case 'handlebars.php':
        require_once('cloned/handlebars.php/src/Handlebars/Autoloader.php');
        Handlebars_Autoloader::register();
        $m = new Handlebars_Engine;
        $test_tmpl = $m->loadTemplate($tmpl_txt);
        $test_method = 'render';
        break;
    case 'lightncandy':
        require_once('cloned/lightncandy/src/lightncandy.inc');
        $php = LightnCandy::compile($tmpl_txt, $flag);
        $inc = preg_replace('/\.tmpl/', '.php', $file);
        file_put_contents($inc, $php);
        $js = preg_replace('/\.tmpl/', '.jsonschema', $file);
        $level = 0;
        file_put_contents($js, preg_replace_callback('/\\{|\\[|,|\\]|\\}|:/', function ($matches) use (&$level) {
            switch ($matches[0]) {
                case '}':
                case ']':
                    $level--;
                    $is = str_repeat("\t", $level);
                    return "\n$is{$matches[0]}";
                case ':':
                    return ': ';
            }
            $br = '';
            switch ($matches[0]) {
                case '{':
                case '[':
                    $level++;
                case ',':
                    $br = "\n";
            }
            $is = str_repeat("\t", $level);
            return "{$matches[0]}$br$is";
        }, json_encode(LightnCandy::getJsonSchema())));
        $test_method = include($inc);
        break;
    case 'php':
        require_once('cloned/mustache-php/src/RendererPHP.php');
        require_once('cloned/mustache-php/src/Template.php');
        $test_tmpl = \Mustache\RendererPHP::create(
             \Mustache\Template::fromTemplateString($tmpl_txt)
        );
        $test_method = 'render';
        break;
    case 'mustache-php':
        require_once('cloned/mustache-php/src/Renderer.php');
        require_once('cloned/mustache-php/src/Template.php');
        $test_tmpl = \Mustache\Renderer::create(
             \Mustache\Template::fromTemplateString($tmpl_txt)
        );
        $test_method = 'render';
        break;
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
