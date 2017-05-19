# A laravel package to interface with the Apixu API

This package adds a facade and a dependency injectable class you can use to make easy calls to the api

## Install

You can install the package via composer:

``` bash
composer require rjvandoesburg/laravel-apixu-client
```

You must install the following service provider:

```php
// config/app.php

'providers' => [
    ...
    Rjvandoesburg\Apixu\ApixuServiceProvider::class,
    ...
];
```

This package requires an API key that can be stored in the `.env` file. You can get your key here: https://www.apixu.com/
The following settings are available for your `.env` file:

```bash
APIXU_KEY={your-key-here}
APIXU_URL=https://api.apixu.com/v1
APIXU_CACHE_LENGTH=30
```

The cache length is how long before new data is fetched from the server, this because you might want to limit the API calls

These settings are set in a config file that you can edit yourself, should you desire to do so.
Execute the following command to get the config file

```bash
php artisan vendor:publish --provider="Rjvandoesburg\Apixu\ApixuServiceProvider"
```

A file named `apixu.php` will be created in the config directory.

## Usage

The API has 4 endpoint
* [Current](https://www.apixu.com/doc/current.aspx)
* [Forecast](https://www.apixu.com/doc/forecast.aspx)
* [History](https://www.apixu.com/doc/history.aspx)
* [Search](https://www.apixu.com/doc/search.aspx)

Each request needs certain parameters, read more about those [here](https://www.apixu.com/doc/request.aspx)

To build op the filters you need to use a FiltersClass and all parameters you can set for the API are defined as properties.
To use the facade to get the current weather, use the following:
```php
$filters = new \Rjvandoesburg\Apixu\Filters([
    'q' => 'London',
]);
$response = \Apixu::current($filters);
```
This will return a `CurrentResponse` which contains all properties returned. 
You can use this response to easily output the response.

The available methods are:
```php
\Apixu::current($filters);
\Apixu::forecast($filters);
\Apixu::history($filters);
\Apixu::search($filters);
```

or use the dependency injection method
```php
public function getWeather(\Rjvandoesburg\Apixu\ApixuClient $apixu)
{
    $filters = new \Rjvandoesburg\Apixu\Filters([
        'q' => 'London',
    ]);
    
    return $apixu->current($filters)
}
```

## Credits

- [Robert-John van Doesburg](https://github.com/rjvandoesburg)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
