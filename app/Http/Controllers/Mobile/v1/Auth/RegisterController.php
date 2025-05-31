<?php

namespace App\Http\Controllers\Mobile\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\RegisterRequest;
use App\Http\Resources\Mobile\LoginResource;
use App\Models\User;
use App\Models\UserInvitation;

class RegisterController extends Controller {


    public function register(RegisterRequest $request){
        $user = User::where(['phone' =>$request->phone,'otp_token' =>$request->otp])->first();
        if(!$user){
            return $this->response->statusFail( trans('messages.phone_or_otp_is_wrong'), 401);
        }
        $data = $request->validated();
        $data['password'] = \Hash::make($data['password']);
        User::where('phone' , $data['phone'])->update(['password' => $data['password'],'otp_token' => null]);
        $user = User::where(['phone' =>$request->phone])->first();
        $user->token = auth('api')->attempt(['phone' =>$data['phone'],'password' => $request->password]);

        return $this->response->statusOk(["data" => new LoginResource($user),"message" => trans('messages.user_created_successfully')]);
    }

}
