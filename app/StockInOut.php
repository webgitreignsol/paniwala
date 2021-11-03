<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StockInOut extends Model
{
    protected $fillable = [
    	'date', 'qty', 'stock_status', 'product_id', 'employee_id', 'remarks'
    ];

    protected $table = 'stock_in_out';


    protected static $logAttributes = ['date', 'qty', 'stock_status', 'product_id', 'employee_id', 'remarks'];
    protected static $logName = 'stock_in_out';
    protected static $logOnlyDirty = true;



    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }


}
