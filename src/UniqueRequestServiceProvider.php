<?php
namespace Inani\UniqueRequest;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class UniqueRequestServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Request::macro('once', function (Closure $function, $key) {
            /** @var Request $this */
            if(!$this->has('uuid_request')){
                return $function();
            }
            return cache()->remember($key. '_' . $this->get('uuid_request'), now()->addSeconds(3), $function);
        });
    }
}
