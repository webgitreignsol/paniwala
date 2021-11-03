<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    protected $fillable =[
    	'product_name', 'price', 'type'
    ];


    protected $table = 'products';


    protected static $logAttributes = ['product_name', 'price', 'type'];
    protected static $logName = 'Product';
    protected static $logOnlyDirty = true;
}
