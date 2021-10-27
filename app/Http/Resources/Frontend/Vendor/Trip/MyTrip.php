<?php
namespace App\Http\Resources\Frontend\Vendor\Trip;
use Illuminate\Http\Resources\Json\JsonResource;

class MyTrip extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'id'                     => $this->id,
            "date"                   => $this->date,
            "time"                   => $this->time,
            "pickup"                 => $this->pickup,
            "pick_up_latitude"       => $this->pick_up_latitude,
            "pick_up_longitude"      => $this->pick_up_longitude,
            "type"                   => $this->type,
            "fare"                   => $this->fare,
            "status"                 => $this->status,
            "destinations"         => $this->ride_drop_off,
            "driver_id"              => $this->driver_id,
            "user_id"                => $this->user_id
        ];
    }
}