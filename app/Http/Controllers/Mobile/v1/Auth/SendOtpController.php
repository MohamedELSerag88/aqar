<?php

namespace App\Http\Controllers\Mobile\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\SendOtpRequest;
use App\Jobs\SendMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Twilio\Rest\Client;

class SendOtpController extends Controller {



    public function sendOtp(SendOtpRequest $request)
    {
        $user = User::firstOrNew(['phone' =>  request('phone')]);
        return $this->sendSmsOtp($user);

    }

    public function sendSmsOtp($user){
        try{
            $otp_token = rand(pow(10, 3), pow(10, 4)-1);
            $user->otp_token = $otp_token;
            $user->otp_sent_at = Carbon::now();
            $user->save();
            return $this->response->statusOk(["message" => trans('messages.sms_sent_with_otp'),"token"=>$otp_token]);
        }
        catch (\Exception $exception){
            return $this->response->statusFail($exception->getMessage(), 500);
        }

    }


}
