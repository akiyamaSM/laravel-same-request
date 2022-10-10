<?php


namespace Inani\UniqueRequest\Middelware;


use Closure;
use Illuminate\Http\Request;

class AddUniqueIdentifier
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->merge([
           'uuid_request' => uniqid(). '_' . time()
        ]);

        return $next($request);
    }
}
