<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Expenditure extends Model
{

    protected $fillable =[
    	'date', 'head_name', 'description', 'amount'
    ];

    protected $table = 'Expenditure';

    protected static $logAttributes = ['date', 'head_name', 'description', 'amount'];
    protected static $logName = 'Expenditure';
    protected static $logOnlyDirty = true;

}
