<?php

namespace App\Http\Controllers\Mobile\v1\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\ChangePhoneRequest;
use App\Http\Requests\Mobile\UpdatePasswordRequest;
use App\Http\Requests\Mobile\UpdatePhoneRequest;
use App\Http\Resources\Mobile\ProfileResource;

class ProfileController extends Controller
{
    public function profile(){
        return $this->response->statusOk(['data' => new ProfileResource(auth()->user())]);
    }
    public function updateProfile(){
        $data = request()->only(['fname','lname','email','bio','type_id']);
        $user = auth('api')->user();
        $user->update($data);
        return $this->response->statusOk(['data' => new ProfileResource($user),  "message" => trans('messages.data_updated_successfully')]);
    }

    public function updatePassword(UpdatePasswordRequest $request){
        $data = $request->only(['current_password', 'new_password', 'new_password_confirmation']);


        $user = auth('api')->user();
        if (!auth('api')->attempt(['phone' =>$user->phone ,'password' => $data['current_password']])) {
            return $this->response->statusFail(['message' => trans('messages.wrong_credentials')]);
        }
        $user->password = \Hash::make($data['new_password']);
        $user->save();
        return $this->response->statusOk(["data" => new ProfileResource($user), "message" => trans('messages.password_updated_successfully')]);
    }
    public function changePhone(ChangePhoneRequest $request){
        $data = $request->only(['phone']);
        return $this->sendSmsOtp(auth('api')->user());
    }
    public function updatePhone(UpdatePhoneRequest $request){
        $data = $request->only(['phone','token']);
        $user = auth('api')->user();
        if(!$this->checkOtp($user , $data['token'])){
            return $this->response->statusFail(['message' => trans('messages.wrong_otp')]);
        }
        $user->phone = $data['phone'];
        $user->save();
        return $this->response->statusOk(["data" => new ProfileResource($user), "message" => trans('messages.data_updated_successfully')]);
    }

}
