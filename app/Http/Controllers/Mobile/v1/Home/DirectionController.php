<?php

namespace App\Http\Controllers\Mobile\v1\Home;

use App\Http\Controllers\Controller;
use App\Http\Filters\RelationPipeline;
use App\Http\Resources\Mobile\DirectionResource;
use App\Models\Direction;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Request;

class DirectionController extends Controller {

    public function index(Request $request)
    {
        $items = app(Pipeline::class)
            ->send(Direction::query())
            ->through([
                RelationPipeline::class,
            ])
            ->thenReturn();

        return $this->response->statusOk(['data' => DirectionResource::collection($items->get())]);
    }


}
