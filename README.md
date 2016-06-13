Jaxon Library for Laravel
=========================

This package integrates the Jaxon library into the Laravel 5 framework.

Features
--------

- Automatically register Jaxon classes from a preset directory.
- Read Jaxon options from a file in Laravel config format.

Installation
------------

Add the following lines in the `composer.json` file, and run the `composer update` command.
```json
"require": {
    "jaxon-php/jaxon-core": "dev-master",
    "jaxon-php/jaxon-framework": "dev-master",
    "jaxon-php/jaxon-laravel": "dev-master"
}
```

Add the following line to the `providers` entry in the `app.php` config file.
```php
Jaxon\Laravel\JaxonServiceProvider::class
```

Add the following line to the `aliases` entry in the `app.php` config file.
```php
'LaravelJaxon' => Jaxon\Laravel\Facades\Jaxon::class
```

Copy the `app/Http/Controllers/JaxonController.php` file of this repo to the `app/Http/Controllers` dir of the Laravel application.

Add the content of the `app/Http/routes.php` file of this repo to the `routes.php` file of the Laravel application.

Configuration
------------

The settings in the jaxon.php config file are separated into two sections.
The options in the `lib` section are those of the Jaxon core library, while the options in the `app` sections are those of the Laravel application.

The following options can be defined in the `app` section of the config file.

| Name | Default value | Description |
|------|---------------|-------------|
| route | jaxon | The route to the Jaxon Controller, as defined in the routes.php file |
| dir | app_path('Jaxon/Controllers') | The directory of the Jaxon classes |
| namespace | \Jaxon\App | The namespace of the Jaxon classes |
| excluded | empty array | Prevent Jaxon from exporting some methods |
| | | |

The `route` option is overriden by the `core.request.uri` option of the Jaxon library.

Usage
-----

This is an example of a Laravel controller using the Jaxon library.
```php
use LaravelJaxon;

class DemoController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
    }

    public function index()
    {
        // Register the Jaxon classes
        LaravelJaxon::register();

        // Print the page
        return view('index', array(
            'JaxonCss' => LaravelJaxon::css(),
            'JaxonJs' => LaravelJaxon::js(),
            'JaxonScript' => LaravelJaxon::script()
        ));
    }
}
```

Before it prints the page, the controller makes a call to `LaravelJaxon::register()` to export the Jaxon classes.
Then it calls the `LaravelJaxon::css()`, `LaravelJaxon::js()` and `LaravelJaxon::script()` functions to get the CSS and javascript codes generated by Jaxon, which it inserts in the page.

### The Jaxon classes

The Jaxon classes of the application must all be located in the directory indicated by the `app.dir` option in the `jaxon.php` config file.
If there is a namespace associated, the `app.namespace` option should be set accordingly.
The `app.namespace` option must be explicitely set to `null`, `false` or an empty string if there is no namespace.

Contribute
----------

- Issue Tracker: github.com/jaxon-php/jaxon-laravel/issues
- Source Code: github.com/jaxon-php/jaxon-laravel

License
-------

The project is licensed under the BSD license.
