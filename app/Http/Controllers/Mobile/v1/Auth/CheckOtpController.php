<?php

namespace App\Http\Controllers\Mobile\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\CheckOtpRequest;
use App\Http\Resources\LoginOtpResource;
use App\Models\AppConfig;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Twilio\Rest\Client;

class CheckOtpController extends Controller {


    public function checkOtp(CheckOtpRequest $request)
    {
        $data = $request->only(['md5_string', 'otp_token']);

        $checkUser = User::where($data)->first();
        $otp_expire = AppConfig::where('key', 'otp_expire')->first();
        if($otp_expire){
            $otp_expire = $otp_expire->value /60;
        }
        else{
            $otp_expire = 10;
        }
        if (!$checkUser)
            return $this->response->statusFail(trans('messages.wrong_otp_token'));
        if($request->otp_type == "sms"){
            $result = $this->verifyOtp($checkUser,$request->otp_token);
            if($result->status == "pending"){
                return $this->response->statusFail(trans('messages.wrong_otp_token'));
            }
        }
        if (Carbon::now()->diffInMinutes($checkUser->otp_sent_at) > $otp_expire)
            return $this->response->statusFail(trans('messages.otp_expired'));

        if (!$token = auth('client')->login($checkUser)) {
            return $this->response->statusFail(trans('messages.wrong_user_data'));
        }

        User::where($data)->update(['otp_token' => null, 'last_time_login' => Carbon::now()]);
        $checkUser->token = $token;
        return $this->response->statusOk(['data' => new LoginOtpResource($checkUser), "message" => trans('messages.logged_in_successfully')]);
    }

    public function verifyOtp($user, $code)
    {
        $account_sid = config("twilio.twilio_account_sid");
        $auth_token = config("twilio.twilio_auth_token");
        $twilio_number = $user->country_code.$user->phone;
        $twilio = new Client($account_sid, $auth_token);
        $serviceSid = config("twilio.twilio_service_sid");
        return $twilio->verify->v2->services($serviceSid)
            ->verificationChecks->create([
                "to" => $twilio_number,
                "code" => $code,
            ]);
    }




}
