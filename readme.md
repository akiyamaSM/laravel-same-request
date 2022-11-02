## Motivation

[![Total Downloads](https://img.shields.io/packagist/dt/inani/laravel-same-request.svg?style=flat-square)]([https://packagist.org/packages/spatie/laravel-rate-limited-job-middleware](https://packagist.org/packages/inani/laravel-same-request))

This laravel package will allow you to execute a code once in the current request based on the key provided. 

## Installation

````
composer require inani/laravel-same-request
````

You will(for L5) need to register the service provider in the  ````config/app.php```` .
````php
return [
       /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        Inani\UniqueRequest\UniqueRequestServiceProvider::class, // <=== HERE
];
````

You will need to use the middleware or binding it globally in your  ````app/Http/Kernel.php````

````php
return [
        'api' => [
                'throttle:120,1',
                'bindings',
                PreventCache::class,
                GetJwtFromCookie::class,
                AddUniqueIdentifier::class
         ],
];
````



## Usage


````php
    for ($i= 0; $i < 2; $i++){
        $greeting = request()->once(function (){
            info('entred once');
            return 'hello';
        }, 'greeting');
    }

    $goodbye = request()->once(function (){
        return 'Saynoara';
    }, 'bye');

    $goodbye = request()->once(function (){
        return 'ByeBye';
    }, 'bye');

    return [$greeting, $goodbye];

````
