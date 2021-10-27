<?php
namespace App\Http\Resources\Frontend\User;
use Illuminate\Http\Resources\Json\JsonResource;

class View extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone ? $this->phone : '',
            'image' => $this->image ? $this->image : ''
        ];
    }
}