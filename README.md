# Nova Html Card

A Laravel Nova card that displays any html content, e.g. lists, notifications, small custom reports.

[//]: # (<p style="text-align: center;" align="center">)

[//]: # ()
[//]: # (<img alt="Laravel Nova HTML Card" src="https://github.com/abordage/nova-html-card/blob/master/docs/images/abordage-nova-html-card-screenshot.png?raw=true">)

[//]: # ()
[//]: # (</p>)


[//]: # (<p style="text-align: center;" align="center">)

[//]: # ()
[//]: # (<a href="https://packagist.org/packages/abordage/nova-html-card" title="Packagist version">)

[//]: # (    <img alt="Packagist Version" src="https://img.shields.io/packagist/v/abordage/nova-html-card">)

[//]: # (</a>)

[//]: # ()
[//]: # (<a href="https://github.com/abordage/nova-html-card/actions/workflows/php-cs-fixer.yml" title="GitHub Code Style Status">)

[//]: # (    <img alt="GitHub Code Style Status" src="https://img.shields.io/github/workflow/status/abordage/nova-html-card/PHP%20CS%20Fixer?label=code%20style">)

[//]: # (</a>)

[//]: # ()
[//]: # (<a href="https://www.php.net/" title="PHP version">)

[//]: # (    <img alt="PHP Version Support" src="https://img.shields.io/packagist/php-v/abordage/nova-html-card">)

[//]: # (</a>)

[//]: # ()
[//]: # (<a href="https://github.com/abordage/nova-html-card/blob/master/LICENSE.md" title="License">)

[//]: # (    <img alt="License" src="https://img.shields.io/github/license/abordage/nova-html-card">)

[//]: # (</a>)

[//]: # ()
[//]: # (</p>)

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
php artisan nova-html-card MyFirstCard
```
By default, all new cards will be placed in the `app/Nova/Cards` directory.

Once your html card class has been generated, you're ready to customize it:

```php
<?php

namespace App\Nova\Cards;

use Abordage\HtmlCard\HtmlCard;

class MyFirstCard extends HtmlCard
{
    public function content(): string
     {
        return '<h1>Some content</h1>';
     }

    /**
     * The width of the card (1/2, 1/3, 1/4 or full).
     *
     * @var string
     */
    public $width = '1/3';

    /**
     * Align content to the center of the card.
     *
     * @var bool
     */
    public bool $center = true;
}
```

Once you have defined a card, you are ready to attach it to a dashboard or resource. You should simply add it to the array of metrics / cards returned by this method:

```php
<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;

class Examples extends Dashboard
{
    public function cards(): array
    {
        return [
            new \App\Nova\Cards\MyFirstCard(),
        ];
    }
}
```

## Feedback
If you have any feedback, comments or suggestions, please feel free to open an issue within this repository.

## Credits

- [Pavel Bychko](https://github.com/abordage)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
