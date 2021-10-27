<?php
namespace App\Http\Resources\Frontend\Vendor\CarMake;
use Illuminate\Http\Resources\Json\JsonResource;

class Listing extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description
        ];
    }
}