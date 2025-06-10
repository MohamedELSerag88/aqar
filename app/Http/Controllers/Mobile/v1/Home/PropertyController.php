<?php

namespace App\Http\Controllers\Mobile\v1\Home;

use App\Http\Controllers\Controller;
use App\Http\Filters\ColumnPipeline;
use App\Http\Filters\PaginationPipeline;
use App\Http\Filters\PricePipeline;
use App\Http\Filters\RelationPipeline;
use App\Http\Filters\SortPipeline;
use App\Http\Resources\Mobile\PropertyResource;
use App\Models\Property;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Request;

class PropertyController extends Controller {

    public function index(Request $request)
    {
        $items = app(Pipeline::class)
            ->send(Property::query())
            ->through([
                PaginationPipeline::class,
                RelationPipeline::class,
                PricePipeline::class,
                ColumnPipeline::class,
                SortPipeline::class,
            ])
            ->thenReturn();
        $data = PropertyResource::collection($items);
        $data = $this->getPaginatedResponse($items, $data);
        return $this->response->statusOk($data);
    }


}
