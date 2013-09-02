<?php

function warn ($str) {
    file_put_contents('php://stderr', "$str\n");
}

function getPartials () {
    $partials = Array();
    foreach (glob('fixture/*.tmpl') as $tmpl) {
        preg_match('/fixture\\/(.+)\\.tmpl/', $tmpl, $matches);
        $partials[$matches[1]] = file_get_contents($tmpl);
    }
    return $partials;
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
        file_put_contents($js, LightnCandy::getJsonSchemaString());
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
        $m = new Mustache_Engine(array(
            'cache' => dirname(__FILE__) . '/cache',
            'logger' => new Mustache_Logger_StreamLogger('php://stderr'),
            'partials' => getPartials()
        ));
        try {
            $test_tmpl = $m->loadTemplate($tmpl_txt);
        } catch (Exception $e) {
            echo "Error....$e\n";
        }
        $test_method = 'render';
        break;

    default:
        die("ERROR!! Do not support this lib: $name !!\n");
    }
}

?>
