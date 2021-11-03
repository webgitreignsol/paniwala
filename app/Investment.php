<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $fillable =[
    	'date', 'name', 'detail', 'amount'
    ];

    protected $table = 'investment';

    protected static $logAttributes = ['date', 'name', 'detail', 'amount'];
    protected static $logName = 'Investment';
    protected static $logOnlyDirty = true;

}
