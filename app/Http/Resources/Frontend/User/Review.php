<?php
namespace App\Http\Resources\Frontend\User;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Frontend\User\View as UserDetails;

class Review extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'id' => $this->id,
            'rating' => $this->rating ? $this->rating : '',
            'comments' => $this->comments ? $this->comments : '',
            'get_review' => $this->get_review ? $this->get_review : '',
            'reviewed_by' => (new UserDetails($this->user))->resolve(),
        ];
    }
}