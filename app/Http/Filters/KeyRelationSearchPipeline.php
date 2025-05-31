<?php


namespace App\Http\Filters;

use Closure;

class KeyRelationSearchPipeline
{
    public function handle($request, Closure $next)
    {
        if (!request()->has('keyword')) {
            return $next($request);
        }
        $query = $next($request);
        $relations = $query->getModel()->searchrelation;
        $keyword = request()->keyword;
        if ($relations && count($relations) && $relations[0]) {
            $query = $query->where(function ($q) use ($relations, $keyword) {
                foreach ($relations as $relation) {
                    $q->orWhereHas($relation['name'], function ($q) use ($keyword, $relation) {
                        $q->where($relation['key'], 'LIKE', '%' . $keyword . '%');
                    });
                }
            });
        }
        return $query;
    }
}
