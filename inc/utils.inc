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
        Handlebars\Autoloader::register();
        //use Handlebars\Handlebars;
        $m = new Handlebars\Handlebars;
        $h = $m->getHelpers();
        $h->add('helper1', function($tmpl, $cx, $args, $src) {
            $v = $tmpl->parseArguments($args);
            // Sorry, handlebars.php auto convert none string to ''
            // We will test on valid values to give it a chance.
            $url = $cx->get($v[0]);
            $txt = $cx->get($v[1]);
            return "<a href=\"{$u}\">{$t}</a>";
        });

        $h->add('helper2', function($tmpl, $cx, $args, $src) {
            // Sorry, handlebars.php do not support named arguments now.
            // We skip testing on helper2 in case 032 to give it a chance.
            $v = $tmpl->parseNamedArguments($args);
            $u = isset($hash['url']) ? $hash['url'] : 'undefined';
            $t = isset($hash['text']) ? $hash['text'] : 'undefined';
            $x = isset($hash['ur"l']) ? $hash['ur"l'] : 'undefined';
            return "<a href=\"{$u}\">{$t}</a>({$x})";
        });

        $h->add('helper3', function($tmpl, $cx, $args, $src) {
            $cx->push(Array('test1','test2','test3'));
            return $tmpl->render($cx);
        });

        $h->add('helper4', function($tmpl, $cx, $args, $src) {
            $args = $tmpl->parseTagAttributes($args);
            if (isset($args['val'])) {
                $cx->set('helper4_value', $args['val'] % 2);
                return $template->render($cx);
            }
            if (isset($args['odd'])) {
                $cx->push(Array(1,3,5,7,9));
                return $template->render($cx);
            }
            return '';
        });

        $test_tmpl = $m->loadTemplate($tmpl_txt);
        $test_method = 'render';
        break;
    case 'lightncandy':
        require_once('cloned/lightncandy/src/lightncandy.php');
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
