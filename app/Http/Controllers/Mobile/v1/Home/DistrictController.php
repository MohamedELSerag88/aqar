<?php

namespace App\Http\Controllers\Mobile\v1\Home;

use App\Http\Controllers\Controller;
use App\Http\Filters\RelationPipeline;
use App\Http\Resources\Mobile\DistrictResource;
use App\Models\District;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Request;

class DistrictController extends Controller {

    public function index(Request $request)
    {
        $items = app(Pipeline::class)
            ->send(District::query())
            ->through([
                RelationPipeline::class,
            ])
            ->thenReturn();
        return $this->response->statusOk(['data' => DistrictResource::collection($items->get())]);
    }


}
