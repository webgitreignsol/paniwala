<?php
namespace App\Http\Resources\Frontend\Vendor\Trip;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Frontend\User\View as UserDetails;

class TripRequestListing extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'id'                   => $this->id,
            "type"                 => $this->type,
            "pick_up"              => $this->pick_up,
            "pick_up_latitude"     => $this->pick_up_latitude,
            "pick_up_longitude"    => $this->pick_up_longitude,
            "date"                 => $this->date ? $this->date : '',
            "time"                 => $this->time ? $this->time : '',
            "car_class"            => $this->car_class,
            "destinations"         => $this->ride_drop_off,
            'user'                 => (new UserDetails($this->user))->resolve(),
        ];
    }
}