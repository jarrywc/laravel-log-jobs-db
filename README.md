# Laravel Database Logger

This package provides a driver to store egress job messages in the database.

Tested on Laravel 9 and 10.

```php
use Illuminate\Support\Facades\Log;

Log::channel('db')->info('Your message');
```

## Installation

You can install the package via composer:

```bash
composer require yoeriboven/laravel-log-db
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="log-db-migrations"
php artisan migrate
```

Now add a new channel to `config/logging.php`.

```php
use Yoeriboven\LaravelLogDb\DatabaseLogger;

return [
    'channels' => [
        'db' => [
            'driver' => 'custom',
            'via'    => DatabaseLogger::class,
        ],
    ]   
]
```

## Usage

You could add the `db` channel to the `stack` channel and then log the normal way.

You could also explicitly log to the database:

```php
use Illuminate\Support\Facades\Log;

Log::channel('db')->info('Your message');
```

### Fallback channel

In case your database isn't ready you can assign a fallback driver to let you know of any issues.

```php
// config/logging.php

return [
    'channels' => [
        'fallback' => [
            'channels' => ['single'],
        ],
    ]   
]
```

If no fallback channel is defined it will default to the `single` channel.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Credits

- [Yoeri Boven](https://twitter.com/yoeriboven)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
