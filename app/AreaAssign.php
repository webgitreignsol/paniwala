<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AreaAssign extends Model
{
    
    protected $fillable = [
    	'employee_id', 'area'
    ];

    protected $table = 'area_assign_employee';


    protected static $logAttributes = ['employee_id', 'area'];
    protected static $logName = 'AreaAssignEmployee';
    protected static $logOnlyDirty = true;



    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }




}
