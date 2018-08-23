# Nova RSS Card

[![Latest Version on Packagist](https://img.shields.io/packagist/v/beyondcode/nova-rss-card.svg?style=flat-square)](https://packagist.org/packages/beyondcode/nova-rss-card)
[![Total Downloads](https://img.shields.io/packagist/dt/beyondcode/nova-rss-card.svg?style=flat-square)](https://packagist.org/packages/beyondcode/nova-rss-card)

Display custom RSS feeds on your Nova dashboard. 

This also works great in combination with the [custom dashboard card](https://github.com/beyondcode/nova-custom-dashboard-card) for Nova.

![tinker screenshot](https://beyondco.de/github/nova-rss-card/screenshot.png)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require beyondcode/nova-rss-card
```

Next up, you must register the card with Nova. This is typically done in the `cards` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvder.php

// ...
public function cards()
{
    return [
        // ...
        new RssCard('https://feed.laravel-news.com/'),
    ];
}
```

## Custom layout

You can customize the RSS feed card height by specifying it as the second parameter in the constructor, like this:

```php
new RssCard('https://feed.laravel-news.com/', '500px),
```

## Custom amount of items

To customize the amount of items to show on your RSS feed card, you can set a `limit` property as a meta attribute on your RSS feed card, like this:

```php
(new RssCard('https://feed.laravel-news.com/', '500px))->withMeta([
    'limit' => 10
]),
```

## Usage

Just visit your Nova dashboard and you'll see the latest entries from your RSS feeds. 

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email marcel@beyondco.de instead of using the issue tracker.

## Credits

- [Marcel Pociot](https://github.com/mpociot)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
