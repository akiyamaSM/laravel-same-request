## Motivation
This laravel package will allow you to execute a code once in the current request based on the key provided. 

## Installation

You will need to register the middelware in the  ````config/app.php```` .
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
