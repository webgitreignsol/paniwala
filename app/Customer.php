<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Customer extends Model
{
    protected $fillable = [
    	'date', 'name', 'email', 'password', 'address', 'phone', 'status','vendor_id'
    ];

    protected $table = 'customer';

    protected static $logAttributes = ['date', 'name', 'email', 'password', 'address', 'phone', 'status','vendor_id'];
    protected static $logName = 'Customer';
    protected static $logOnlyDirty = true;


    public function vendor()
    {
    	return $this->belongsTo('App\User', 'vendor_id');
    }


}
