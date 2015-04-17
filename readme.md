# FakeMiddleware

A small Laravel 5 package that let you remove a global middleware or bypass a route middleware in a testing environment.

## Installation
```
composer require --dev "moon/fakemiddleware": "1.0"
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
