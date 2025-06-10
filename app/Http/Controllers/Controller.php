<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Traits\ApiPaginator;
use App\Http\Requests\Mobile\CheckOtpRequest;
use App\Http\Resources\LoginOtpResource;
use App\Http\Response\Response;
use App\Models\AppConfig;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

abstract class Controller
{
    use ApiPaginator;
    public function __construct(Response $response)
    {
        $locale = request()->header('lang', 'en');
        if (in_array($locale, config('app.locales')))
            App::setLocale($locale);


        $this->response = $response;
    }

    protected function respondWithCollection($collection): mixed
    {
        $data = forward_static_call([$this->modelResource, 'collection'], $collection);
        $data = $this->getPaginatedResponse($collection, $data);
        return $this->response->statusOk($data);
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
    public function checkOtp($user, $token)
    {

        if ($user->otp_token != $token) {
            return false;
        }
        $otp_expire = 20;
        if (Carbon::now()->diffInMinutes($user->otp_sent_at) > $otp_expire)
            return false;

        return true;
    }
}
