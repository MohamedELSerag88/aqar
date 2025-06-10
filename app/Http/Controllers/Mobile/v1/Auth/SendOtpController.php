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


}
