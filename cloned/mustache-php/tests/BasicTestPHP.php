<?php

require '../src/Template.php';
require '../src/RendererPHP.php';

$tpl = \Mustache\Template::fromTemplateString('This is a {{test}}');
$rdr = \Mustache\RendererPHP::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('This is a {{{test}}}');
$rdr = \Mustache\RendererPHP::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('This is a <?php unlink(\'/\') ?> {{test}}');
$rdr = \Mustache\RendererPHP::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));

echo str_repeat('-', 78)."\n";

$tpl = \Mustache\Template::fromTemplateString('{{#section}}[ this is {{adjective}} ] {{/section}}');
$rdr = \Mustache\RendererPHP::create($tpl);

var_dump($tpl->__toString());
var_dump($rdr->render(array()));
