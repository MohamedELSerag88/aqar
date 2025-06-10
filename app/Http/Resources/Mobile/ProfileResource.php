<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "fname" => $this->fname ,
            "lname" => $this->lname ,
            "email" => $this->email ,
            "phone" => $this->phone ,
            "type" => $this->type->name ,
            "bio" => $this->bio ,
        ];
    }
}
