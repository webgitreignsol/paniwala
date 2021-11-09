<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model
{
    use LogsActivity;
    protected $fillable = [
        'order_date', 'employee_id', 'customer_id', 'status', 'vendor_id', 'sub_total', 'vat','grand_total','paid_amount'
    ];

    protected $table = 'orders';

    protected static $logAttributes = ['order_date', 'employee_id', 'customer_id', 'status', 'vendor_id', 'sub_total', 'vat','grand_total','paid_amount'];
    protected static $logName = 'Order';
    protected static $logOnlyDirty = true;


    public function vendor()
    {
        return $this->belongsTo('App\User', 'vendor_id');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function items()
    {
        return $this->hasMany('App\OrderItem', 'order_id');
    }
}
