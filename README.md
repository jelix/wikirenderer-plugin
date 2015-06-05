This is a plugin for jTpl or Castor, the template engine used by Jelix.

This plugin allows to access to render wiki content in a template.
It uses the library [WikiRenderer](http://wikirenderer.jelix.org).

This plugin is for Jelix 1.7.x and higher. See the jelix/jelix repository to see
its history before Jelix 1.7.

## installation

Install it by hands like any other Jelix plugins, or use Composer if you installed
Jelix 1.7+ with Composer.

In your project:

```
composer require "jelix/wikirenderer-plugin:1.7.0"
```

Usage in a template:

```
 <div>
    {$mywikicontent|wiki}
 </div>
```

See Jelix manual for more examples.
