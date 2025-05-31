<?php

namespace App\Http\Requests\Mobile;

use App\Http\Requests\ResponseShape;

class CheckOtpRequest extends ResponseShape
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "otp_token" => "required",
            "md5_string" => "required"
        ];
    }
}
