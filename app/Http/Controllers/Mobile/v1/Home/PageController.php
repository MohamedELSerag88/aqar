<?php

namespace App\Http\Controllers\Mobile\v1\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\PageResource;
use App\Models\Page;

class PageController extends Controller {

    public function index($slug)
    {
        $page = Page::where('slug',$slug)->first();
        return $this->response->statusOk(['data' => new PageResource($page)]);
    }


}
