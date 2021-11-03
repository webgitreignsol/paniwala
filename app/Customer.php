<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Customer extends Model
{
    protected $fillable = [
    	'date', 'name', 'email', 'password', 'security_deposit', 'address', 'phone', 'area', 'days', 'required_bottle', 'opening_bottle', 'opening_balance', 'remarks', 'status'
    ];

    protected $table = 'customer';

    protected static $logAttributes = ['date', 'name', 'email', 'password', 'security_deposit', 'address', 'phone', 'area', 'days', 'required_bottle', 'opening_bottle', 'opening_balance', 'remarks', 'status'];
    protected static $logName = 'Customer';
    protected static $logOnlyDirty = true;


    public function employee()
    {
    	return $this->belongsTo('App\Employee', 'employee_id');
    }


}
