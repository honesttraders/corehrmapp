# OnestTech Ltd IT HRM Core Service

[![Latest Version on Packagist](https://img.shields.io/packagist/v/honesttraders/core-service.svg?style=flat-square)](https://packagist.org/packages/honesttraders/core-service)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)



[![GitHub issues](https://img.shields.io/github/issues/honesttraders/core-service.svg?style=flat-square)](https://img.shields.io/github/issues/honesttraders/core-service)
[![GitHub forks](https://img.shields.io/github/forks/honesttraders/core-service.svg?style=flat-square)](https://img.shields.io/github/forks/honesttraders/core-service)
[![GitHub stars](https://img.shields.io/github/stars/honesttraders/core-service.svg?style=flat-square)](https://img.shields.io/github/stars/honesttraders/core-service)
[![GitHub license](https://img.shields.io/github/license/honesttraders/core-service.svg?style=flat-square)](https://img.shields.io/github/license/honesttraders/core-service)


| **Laravel**  |  **service** |
|---|---|
| 7.0  | ^1.0 |

`honesttraders/corehrmapp` is a Laravel package which manage your application installation and update system. This package is supported and tested in Laravel 7. It is a core package of honesttraders.

## Requirements
- [PHP >= 7.2](http://php.net/)
- [Laravel 7|8](https://github.com/laravel/framework)


## Credits

- [honesttraders](https://onesttech.com)


## Instalation 

Go to karnel.php and add "\HonestTraders\CoreHrmApp\Middleware\CoreHrmAppService::class" this line
```php
    protected $middlewareGroups = [
        'web' => [
                \HonestTraders\CoreHrmApp\Middleware\CoreHrmAppService::class,
        ]
    ];
 ```

The following examples demonstrate different uses of the vendor:publish command: 


```bash
    php artisan vendor:publish
```

Select honesttraders



In app\Http\Middleware\VerifyCsrfToken.php  File add this line to skip csrf token check for corehrmapp
```php
    protected $except = [
        'install/*'
    ];
```
## About honesttraders Ltd

honesttraders Ltd. is a web development company which is specialising on the Laravel framework.  We are a team of dedicated and experienced Laravel developers who are passionate about building high quality Laravel applications.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
