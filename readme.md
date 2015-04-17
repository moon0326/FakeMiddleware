# FakeMiddleware

![](https://travis-ci.org/moon0326/FakeMiddleware.svg)

Sometimes you want to disable a middleware/route middleware when testing a controller in Laravel 5.
This package simplifies the process.

## Installation
```
composer require --dev "moon/fakemiddleware": "1.1"
```
## Usage

Open **TestCase.php**, which comes with L5 by default.
Locate **createApplication** method and initialize FakeMiddleware.

```php

use Moon\FakeMiddleware\FakeMiddleware;

public function createApplication()
{
    $app = require __DIR__.'/../bootstrap/app.php';
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

    // This will remove VerifyCsrfToken and repalce auth middleware
    // with a fake middleware
    new FakeMiddleware($app, ['App\Http\Middleware\VerifyCsrfToken'], ['auth']);

    return $app;
}
```
