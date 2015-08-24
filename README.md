# Landish/Pagination

[![Build Status](https://travis-ci.org/Landish/Pagination.svg?branch=master)](https://travis-ci.org/Landish/Pagination)
[![Latest Stable Version](https://poser.pugx.org/landish/pagination/v/stable)](https://packagist.org/packages/landish/pagination) 
[![Total Downloads](https://poser.pugx.org/landish/pagination/downloads)](https://packagist.org/packages/landish/pagination) 
[![Latest Unstable Version](https://poser.pugx.org/landish/pagination/v/unstable)](https://packagist.org/packages/landish/pagination) 
[![License](https://poser.pugx.org/landish/pagination/license)](https://packagist.org/packages/landish/pagination)

[Laravel 5](http://laravel.com/) comes with [Pagination](http://laravel.com/docs/5.0/pagination) class, which is perfectly rendered to match [Bootstrap 3](http://getbootstrap.com/components/#pagination) styles. 

This package gives you ability to change the display output of rendered pagination elements for Front-end Frameworks, such as: [Semantic UI](http://semantic-ui.com/collections/menu.html#pagination), [Zurb Foundation](http://foundation.zurb.com/docs/components/pagination.html), [UIKit](http://getuikit.com/docs/pagination.html) and [Materialize](http://materializecss.com/).

With this package it is also very easy to [create custom pagination](#create-custom-pagination) HTML output.

## Table of Contents
* [Installation](#installation)
* [Usage](#usage)
* [Usage - Recommended Way](#usage---recommended-way)
* [Simple Pagination](#simple-pagination)
* [Additional Wrappers](#additional-wrappers)
* [Appending To Pagination Links](#appending-to-pagination-links)
* [Create Custom Pagination](#create-custom-pagination)
* [License](#license)


## Installation

To install `landish/pagination` package, you have to run the following command in your Terminal, or Comand Promt:

```
$ composer require landish/pagination
```

Or manually add the following lines in to your `composer.json` file:

```json
"require": {
    "landish/pagination": "~1.0"
}
```

and run the `composer update` or `composer install` command.

## Usage

Add following lines of code in your `*.blade.php` file, where you want to dispay the pagination.

For [Semantic UI](http://semantic-ui.com/):

```php
{!! (new Landish\Pagination\SemanticUI($items))->render() !!}
// or add "\Simple" in namespace for "Simple Pagination"
{!! (new Landish\Pagination\Simple\SemanticUI($items))->render() !!}
```

For [Zurb Foundation](http://foundation.zurb.com/):

```php
{!! (new Landish\Pagination\ZurbFoundation($items))->render() !!}
// or add "\Simple" in namespace for "Simple Pagination"
{!! (new Landish\Pagination\Simple\ZurbFoundation($items))->render() !!}
```

For [UIKit](http://getuikit.com/):

```php
{!! (new Landish\Pagination\UIKit($items))->render() !!}
// or add "\Simple" in namespace for "Simple Pagination"
{!! (new Landish\Pagination\Simple\UIKit($items))->render() !!}
```

For [Materialize](http://materializecss.com/) (Contributed by [@arandilopez](https://github.com/arandilopez)):

```php
{!! (new Landish\Pagination\Materialize($items))->render() !!}
// or add "\Simple" in namespace for "Simple Pagination"
{!! (new Landish\Pagination\Simple\Materialize($items))->render() !!}
```

## Usage - Recommended Way

If you display pagination on several pages of your web application and have to write to the output code in several files, then this is, what I would recommend to do:

Just create `Pagination.php` file in your `/app/` directory and paste the following code:

> **Note:** This example is suitable for you, if you haven't change the [Laravel Application Namespace](http://laravel.com/docs/5.0/structure#namespacing-your-application), otherwise just use your custom namespace instead of `App`.

```php
<?php namespace App;

use Landish\Pagination\SemanticUI;

// Uncomment bellow line, if you like to use "Simple Pagination"
// use Landish\Pagination\Simple\SemanticUI;

class Pagination extends SemanticUI {

}
```

In that case, you only have to add the following code in your blade template files:

```php
{!! (new App\Pagination($items))->render() !!}
```

And in future, if you decide to override the output of pagination elements, it will be much more easier to change in `app/Pagination.php` file, rather then in several blade template files.

## Simple Pagination

[Laravel](http://laravel.com/docs/5.0/pagination) gives you ability to create "Simple Pagination", which will have only `Previous` and `Next` buttons, something like [Bootstrap](http://getbootstrap.com/components/#pagination-pager) has. 

The `landish/pagination` package supports this kind of pagination for [Semantic UI](http://semantic-ui.com/collections/menu.html#pagination), [Zurb Foundation](http://foundation.zurb.com/docs/components/pagination.html) and [UIKit](http://getuikit.com/docs/pagination.html).

In order to use, first call the [`simplePaginate()`](http://laravel.com/api/5.0/Illuminate/Database/Eloquent/Builder.html#method_simplePaginate) method on Eloquent Model.

```php
$items = User::where('votes', '>', 100)->simplePaginate(15);
```

And after that, add the `\Simple` suffix in namespace, when displaying the pagination output. Something like this:

```php
{!! (new Landish\Pagination\Simple\ZurbFoundation($items))->render() !!}
```

## Additional Wrappers

If you need to add additional wrappers to your pagination output, which will be displayed only if items have pages, then you can do it like this:

```php
@if($items->hasPages())
	<div class="pagination-wrapper">
    	<div class="pagination-wrapper-inner">
        	{!! (new App\Pagination($items))->render() !!}
        </div>
	</div>
@endif
```

Of course, you are free to change the `.pagination-wrapper` and `.pagination-wrapper-inner` CSS classes and the HTML.

## Appending To Pagination Links

[Appending to pagination links](http://laravel.com/docs/5.0/pagination#appending-to-pagination-links) gives you ability to add extra query strings to your pagination links.

With this package you can do it with following lines of code:

```php
{!! $items->appends(['key' => 'value'])->render(new App\Pagination($items))  !!}
```

## Create Custom Pagination

Creating custom pagination or extending `landish/pagination` package is very easy. 

[`Landish\Pagination\PaginationHTML`](https://github.com/Landish/Pagination/blob/master/src/PaginationHTML.php) class contains the following properties:

```php
<?php namespace Landish\Pagination;

class PaginationHTML {

    /**
     * Pagination wrapper HTML.
     *
     * @var string
     */
    protected $paginationWrapper = '<ul class="pagination">%s %s %s</ul>';

    /**
     * Available page wrapper HTML.
     *
     * @var string
     */
    protected $availablePageWrapper = '<li><a href="%s">%s</a></li>';

    /**
     * Get active page wrapper HTML.
     *
     * @var string
     */
    protected $activePageWrapper = '<li class="active"><span>%s</span></li>';

    /**
     * Get disabled page wrapper HTML.
     *
     * @var string
     */
    protected $disabledPageWrapper = '<li class="disabled"><span>%s</span></li>';

    /**
     * Previous button text.
     *
     * @var string
     */
    protected $previousButtonText = '&laquo;';

    /**
     * Next button text.
     *
     * @var string
     */
    protected $nextButtonText = '&raquo;';

    /***
     * "Dots" text.
     *
     * @var string
     */
    protected $dotsText = '...';
    
    ...
    
    }
```

Simply extend the `Landish\Pagination\Pagination` class in your `app/pagination.php` file, just like I [recommended](#usage---recommended-way) above and overwrite these properties:

```php
<?php namespace App;

use Landish\Pagination\Pagination as BasePagination;

class Pagination extends BasePagination {
	
	/**
     * Pagination wrapper HTML.
     *
     * @var string
     */
	protected $paginationWrapper = '<ol class="pagination-extended-css-class">%s %s %s</ol>';
	
	...
}
```

After that, just simply place the following code in your blade template file.

```php
{!! (new App\Pagination($items))->render() !!}
```

## License

The Landish/Pagination package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)