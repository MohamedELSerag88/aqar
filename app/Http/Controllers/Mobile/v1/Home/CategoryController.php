<?php

namespace App\Http\Controllers\Mobile\v1\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\Request;

class CategoryController extends Controller {

    public function index(Request $request)
    {
        $categories = Category::all();
        return $this->response->statusOk(['data' => CategoryResource::collection($categories)]);
    }


}
