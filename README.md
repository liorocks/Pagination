# Landish/Pagination

[![Latest Stable Version](https://poser.pugx.org/landish/pagination/v/stable.svg)](https://packagist.org/packages/landish/pagination) 
[![Total Downloads](https://poser.pugx.org/landish/pagination/downloads.svg)](https://packagist.org/packages/landish/pagination) 
[![Latest Unstable Version](https://poser.pugx.org/landish/pagination/v/unstable.svg)](https://packagist.org/packages/landish/pagination) 
[![License](https://poser.pugx.org/landish/pagination/license.svg)](https://packagist.org/packages/landish/pagination)

[Laravel 5](http://laravel.com/) comes with [Pagination](http://laravel.com/docs/5.0/pagination) class, which is perfectly rendered to match [Bootstrap 3](http://getbootstrap.com/components/#pagination) styles. 

This package gives you ability to change the display output of rendered pagination elements for Front-end Frameworks, such as: [Semantic UI](http://semantic-ui.com/collections/menu.html#pagination), [Zurb Foundation](http://foundation.zurb.com/docs/components/pagination.html) and [UIKit](http://getuikit.com/docs/pagination.html).

## Installation

To install `landish/pagination` package, you have to run the following command in your Terminal, or Comand Promt:

```
composer require landish/pagination
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
```
{!! (new Landish\Pagination\SemanticUI($items))->render() !!}
```

For [Zurb Foundation](http://foundation.zurb.com/):

```
{!! (new Landish\Pagination\ZurbFoundation($items))->render() !!}
```

For [UIKit](http://getuikit.com/):

```
{!! (new Landish\Pagination\UIKit($items))->render() !!}
```

## Usage ( Recommended )

If you display pagination on several pages of your web application and have to write to the output code in several files, then this is, what I would recommend to do:

Just create `Pagination.php` file in your `/app/` directory and paste the following code:

```php
<?php namespace App;

use Landish\Pagination\SemanticUI;

class Pagination extends SemanticUI {

}
```

In that case, you only have to add the following code in your blade template files:

```
{!! (new App\Pagination($items))->render() !!}
```

And in future, if you decide to override the output of pagination elements, it will be much more easier to change in `app/Pagination.php` file, rather then in several blade template files.

## Additional Wrappers

If you need to add additional wrappers to your pagination output, which will be displayed only if items have pages, then you can do it like this:

```
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

```
{!! $items->appends(['key' => 'value'])->render(new App\Pagination($items))  !!}
```

## License

The Landish/Pagination package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)