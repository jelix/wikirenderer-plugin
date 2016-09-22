This is a plugin for jTpl or Castor, the template engine used by Jelix.

This plugin allows to render wiki content in a template.
It uses the class jWiki (see lib/), based on the library [WikiRenderer](http://wikirenderer.jelix.org).

This plugin is for Jelix 1.7.x and higher. See the jelix/jelix repository to see
its history before Jelix 1.7.

## installation

Install it by hands like any other Jelix plugins, or use Composer if you installed
Jelix 1.7+ with Composer.

In your project:

```
composer require "jelix/wikirenderer-plugin:1.7.1"
```

## Usage in a template

```
 <div>
    {$mywikicontent|wiki}
 </div>
```

## jWiki Usage

jWiki is a class transforming wiki text to other formats. XHTML for example.
This class inherits from [[http://wikirenderer.jelix.org|Wikirenderer]] version 3.1.

In order to transform, Wikirenderer needs some precise objects, which grouped
together become the //transform rules//.

There are a bunch of //transform rules// already bundled by WikiRenderer.
For instance, wr3_to_xhtml allows to transform
wiki (wr3 syntax) into XHTML. It is also possible to transform dokuwiki code
into XHTML, or mediawiki into docbook. All combinations are possible. you only
need to give or develop the good set of transform rules. 

To use jWiki, just instantiate it with a //transform rules// name. If you want
to transform wiki wr3 into XHTML, just do: 

<code php>
   $wr = new jWiki('wr3_to_xhtml');
   $xhtml = $wr->render($wiki_text);
</code>


You can add your own set in @@F@your_app/plugins/wr_rules/@@. Note:
remember to activate app:plugins repository in your configuration, if you
intend to do so.

If you store your own //transform rules// into @@F@your_app/plugins/wr_rules/@@,
each //transform rules// should be in its own directory, like any jelix plugins.
So, if you have a "superwiki_to_xhtml" rule, you have to store its source code
into the file
@@F@your_app/plugins/wr_rules/superwiki_to_xhtml/superwiki_to_xhtml.rule.php@@.

In this file you should have a class @@C@superwiki_to_xhtml@@ inheriting from
@@C@WikiRendererConfig@@ or the class of an other rule.

For more informations, browse the [[http://wikirenderer.jelix.org|Wikirenderer Documentation]].


