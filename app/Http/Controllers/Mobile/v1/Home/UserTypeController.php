<?php

namespace App\Http\Controllers\Mobile\v1\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\UserTypeResource;
use App\Models\UserType;
use Illuminate\Support\Facades\Request;

class UserTypeController extends Controller {

    public function index(Request $request)
    {
        $userTypes = UserType::all();
        return $this->response->statusOk(['data' => UserTypeResource::collection($userTypes)]);
    }


}
