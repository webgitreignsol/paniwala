<?php
namespace App\Http\Resources\Frontend\Customer\Driver;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Frontend\Vendor\CarMake\Listing as CarMakeDetails;
use App\Http\Resources\Frontend\User\View as DriverDetails;

class DriverDetail extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'id'                        => $this->id,
            "cnic_front_side"            => $this->cnic_front_side,
            "cnic_back_side"              => $this->cnic_back_side,
            "driver_photo"                 => $this->driver_photo,
            "driving_license"                => $this->driving_license,
            "car_registration_book"            => $this->car_registration_book,
            'driver'                    => (new DriverDetails($this->driver))->resolve(),     
        ];
    }
}