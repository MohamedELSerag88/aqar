<?php

namespace App\Http\Controllers\Mobile\v1\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\CategoryResource;
use App\Http\Resources\Mobile\CityResource;
use App\Models\Category;
use App\Models\City;
use Illuminate\Support\Facades\Request;

class CityController extends Controller {

    public function index(Request $request)
    {
        $categories = City::all();
        return $this->response->statusOk(['data' => CityResource::collection($categories)]);
    }


}
