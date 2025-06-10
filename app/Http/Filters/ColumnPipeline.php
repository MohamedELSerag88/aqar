<?php


namespace App\Http\Filters;

use Closure;

class ColumnPipeline
{
    public function handle($request, Closure $next)
    {
        $query = $next($request);
        $fields = $query->getModel()->filterColumns;
        foreach ($fields as $field) {
            if(request()->$field){
                $query = $query->where($field, request()->$field);
            }
        }
        return $next($request);
    }
}
