<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class FillingStock extends Model
{
    protected $fillable = [
    	'date', 'filling_stock', 'empty_stock', 'product_id'
    ];

    protected $table = 'bottle_filling_stock';


    protected static $logAttributes = ['date', 'filling_stock', 'empty_stock', 'product_id'];
    protected static $logName = 'FillingStock';
    protected static $logOnlyDirty = true;



    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
