# Mustache PHP

This particular PHP implementation of Mustache has a few features that are
unique, as far as I can tell:

 - Ability to save a "compiled" version of the template to avoid parsing it
   repeatedly
 - Ability to compile a Mustache template to pure PHP code
 - Support for passing parameters into partials (described below)

There are a few other features that might be useful:

 - Implicit iterator with `{{.}}`
 - Dot notation to access sub-values, e.g. `{{foo.bar}}` instead of `{{#foo}}{{bar}}{{/foo}}`
 - Capturing sections (described below)

There is one notable missing feature:

 - Sections do not currently support lambda values; they are treated as truthy single values.

## Quickstart

    $data = array('test' => 'test of the Mustache templating system in PHP');
    $tpl = \Mustache\Renderer::create(
      \Mustache\Template::fromTemplateString('This is a {{test}}')
    );
    $tpl->render($data);

## Parameters for partials

With this implementation, there is support for passing additional context
parameters into partials. This means you can avoid twisting your data model in
order to use the same partial multiple times with different data. For example:

    <ul>
    {{#inputs}}
      <li>
      {{#checkbox}}
        {{> label}}
        {{> input}}
      {{/checkbox}}
      {{^checkbox}}
        {{> input}}
        {{> label}}
      {{/checkbox}}
      </li>
    {{/inputs}}
    </ul>
    <p>{{> input type=submit value="Just do it"}}</p>

Parameter names must not contain whitespace, the equals symbol, or the
end-of-tag delimiter. If the parameter value does not contain whitespace, it
doesn't need quotes (otherwise double quotes are required). Parameter values
must not contain the end-of-tag delimiter.

## Capturing sections

Taking an idea from Kohana, it is possible to update the data model in the
current scope. A section that starts with `$` will render its content and
store it under the tag name in the current scope, overwriting any existing
value. The entire section renders to an empty string.

    {{$sidebar}}
      <div class="one two three four">
      <h1>Custom element</h1>
      </div>
    {{/sidebar}}

... then later...

    <aside class="sidebar">{{& sidebar}}</aside>

But beware:

    {{#section}}
      {{$capture}}Capture this{{/capture}}
    {{/section}}
    {{capture}}

will always render as empty, as `capture` was set inside the `section` scope.

It is valid to use dot syntax inside the capture tag name. Elements will be
created if they do not already exist.
