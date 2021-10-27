<?php
namespace App\Http\Resources\Frontend\User;
use Illuminate\Http\Resources\Json\JsonResource;

class GetProfile extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'image' => $this->image ? $this->image : '',
            'date_of_birth' => $this->date_of_birth ? $this->date_of_birth : '',
            'gender' => $this->gender ? $this->gender : '',
        ];
    }
}