<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class OrderItem extends Model
{
    use LogsActivity;
    protected $fillable = [
        'order_id', 'product_id', 'qty', 'price', 'total'];

    protected $table = 'order_items';

    protected static $logAttributes = ['order_id', 'product_id', 'qty', 'price', 'total'];
    protected static $logName = 'Order Item';
    protected static $logOnlyDirty = true;

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
