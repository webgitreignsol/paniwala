<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Employee extends Model
{
    protected $fillable = [
    	'first_name', 'last_name', 'email', 'join_date', 'address', 'designation', 'timing_status', 'cnic', 'phone', 'password', 'status', 'vendor_id'
    ];

    protected $table = 'employee';

    protected static $logAttributes = ['first_name', 'last_name', 'email', 'join_date', 'address', 'designation', 'timing_status', 'cnic', 'phone', 'password', 'status', 'vendor_id'];
    protected static $logName = 'Employee';
    protected static $logOnlyDirty = true;


}
