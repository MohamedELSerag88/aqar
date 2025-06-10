<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyMapResource extends JsonResource
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
            "title" => $this->title ,
            "description" => $this->description ,
            "price" => $this->price ,
            "area" => $this->area ,
            "latitude"=>$this->latitude,
            "longitude"=>$this->longitude
        ];
    }
}
