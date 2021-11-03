<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CustomerBookingDays extends Model
{
	protected $fillable =[
		'customer_id', 'days', 'required_bottle'
	];


    protected $table = 'customer_booking_days';

    protected static $logAttributes = ['customer_id', 'days', 'required_bottle'];
    protected static $logName = 'CustomerBookingDays';
    protected static $logOnlyDirty = true;



}
