<?php

namespace App\Http\Controllers\Mobile\v1\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\CityResource;
use App\Models\City;
use Illuminate\Support\Facades\Request;

class CityController extends Controller {

    public function index(Request $request)
    {
        $cities = City::all();
        return $this->response->statusOk(['data' => CityResource::collection($cities)]);
    }


}
