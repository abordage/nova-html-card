# Nova Html Card

A Laravel Nova card that displays any html content, e.g. lists, notifications, small custom reports.

<p style="text-align: center;" align="center">
<img alt="Laravel Nova HTML Card" src="https://github.com/abordage/nova-html-card/blob/master/docs/images/abordage-nova-html-card.png?raw=true">
</p>


<p style="text-align: center;" align="center">

<a href="https://packagist.org/packages/abordage/nova-html-card" title="Packagist version">
    <img alt="Packagist Version" src="https://img.shields.io/packagist/v/abordage/nova-html-card">
</a>

<a href="https://github.com/abordage/nova-html-card/actions/workflows/php-cs-fixer.yml" title="GitHub Code Style Status">
    <img alt="GitHub Code Style Status" src="https://img.shields.io/github/workflow/status/abordage/nova-html-card/PHP%20CS%20Fixer?label=code%20style">
</a>

<a href="https://nova.laravel.com/docs/4.0/" title="Laravel Nova Version">
    <img alt="Laravel Nova Version" src="https://img.shields.io/badge/laravel%20nova-4.0-1DA5E7">
</a>

<a href="https://www.php.net/" title="PHP version">
    <img alt="PHP Version Support" src="https://img.shields.io/packagist/php-v/abordage/nova-html-card">
</a>

<a href="https://github.com/abordage/nova-html-card/blob/master/LICENSE.md" title="License">
    <img alt="License" src="https://img.shields.io/github/license/abordage/nova-html-card">
</a>


</p>

## Requirements
- PHP 7.4 or higher
- Nova 4

## Installation

You can install the package via composer:

```bash
composer require abordage/nova-html-card
```

## Usage

To create a cards use the `artisan` command:

```bash
php artisan nova-html-card MyHtmlCard
```
By default, all new cards will be placed in the `app/Nova/Cards` directory. Once your html card class has been generated, 
you're ready to customize it:

```php
<?php

namespace App\Nova\Cards;

use Abordage\HtmlCard\HtmlCard;

class MyHtmlCard extends HtmlCard
{
    /**
     * Name of the card (optional)
     */
    public string $title = '';

    /**
     * The width of the card (1/2, 1/3, 1/4 or full).
     */
    public $width = '1/3';

    /**
     * The height strategy of the card (fixed or dynamic).
     */
    public $height = 'fixed';

    /**
     * Align content to the center of the card.
     */
    public bool $center = true;

    /**
     * Html content
     */
    public function content(): string
     {
        return '<h1 class="text-4xl">Some content</h1>';
     }
}

```
If set `$height = 'fixed'` content will scroll

<p style="text-align: center;" align="center">
<img alt="Laravel Nova HTML Card" src="https://github.com/abordage/nova-html-card/blob/master/docs/images/abordage-nova-html-card-height-fixed.gif?raw=true">
</p>


Once you have defined a card, you are ready to attach it to a dashboard or resource. You should simply add it to the array of metrics / cards.




## Feedback
If you have any feedback, comments or suggestions, please feel free to open an issue within this repository.

## Credits

- [Pavel Bychko](https://github.com/abordage)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
