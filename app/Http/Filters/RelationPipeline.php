<?php


namespace App\Http\Filters;

use Closure;

class RelationPipeline
{
    public function handle($request, Closure $next)
    {
        $conditions = request()->all();
        $relation_ids = array_filter(array_keys($conditions), function ($key) {
            return strpos($key, '_ids') !== false;
        });
        $query = $next($request);

        if (count($relation_ids)) {
            foreach ($relation_ids as $id) {
                $relation_value_ids = explode(',', $conditions[$id]);
                if(class_basename($query->getModel()) == 'Property' && $id == 'direction_ids'){
                    $query = $query->whereHas('district', function ($q) use ($relation_value_ids) {
                        $q->whereHas('direction', function ($district) use ($relation_value_ids) {
                            $district->whereIn('id', $relation_value_ids);
                        });
                    });
                }
                if(class_basename($query->getModel()) == 'Property' && $id == 'city_ids'){
                    $query = $query->whereHas('district', function ($q) use ($relation_value_ids) {
                        $q->whereHas('direction', function ($district) use ($relation_value_ids) {
                            $district->whereHas('city', function ($city) use ($relation_value_ids) {
                                $city->whereIn('id', $relation_value_ids);
                            });
                        });
                    });
                }
                else{
                    $many_to_many_relation = str_replace('_ids', 's', $id);
                    $one_to_many_relation = str_replace('_ids', '', $id);
                    $id = strpos($id, 'ies_ids') !== false ? str_replace('ies_ids', 'y_id', $id) : str_replace('ids', 'id', $id);
                    $relation_name = method_exists($query->getModel(), $many_to_many_relation) ? $many_to_many_relation : null;
                    $relation_name = !$relation_name && method_exists($query->getModel(), $one_to_many_relation) ? $one_to_many_relation : null;
                    if($relation_name){
                        $query = $query->whereHas($relation_name, function ($q) use ($relation_value_ids, $id) {
                            $q->whereIn($id, $relation_value_ids);
                        });
                    }

                }
            }
            return $query;
        } else {
            return $next($request);
        }
    }
}
