<?php

namespace App\Http\Requests\Mobile;

use App\Http\Requests\ResponseShape as FormRequest;

class UpdateProfileRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            "fname" => "required",
            "lname" => "required",
            "email" => "required|email",
            "bio" => "",
            "type_id" => "required|exists:user_types,id",
        ];
    }
}
