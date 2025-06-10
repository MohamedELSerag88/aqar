<?php


namespace App\Http\Filters;

use Closure;

class PricePipeline
{
    public function handle($request, Closure $next)
    {
        if (!request()->has('price_range')) {
            return $next($request);
        }
        return $next($request)->whereBetween('price', explode('-',request()->price_range));
    }
}
