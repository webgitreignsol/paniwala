<?php
namespace App\Http\Resources\Frontend\Customer\CarClass;
use Illuminate\Http\Resources\Json\JsonResource;

class Listing extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image
        ];
    }
}