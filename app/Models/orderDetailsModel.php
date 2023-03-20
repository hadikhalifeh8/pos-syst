<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetailsModel extends Model
{
    use HasFactory;

    protected $table = 'ordersdetails';
    protected $fillable=['order_id','items_id ','quantity','price','totalprice'];

    public function order_rltn()
    {
        return $this->belongsTo('App\Models\OrdersModel', 'order_id');
    }

    
    public function items_rltn()
    {
        return $this->belongsTo('App\Models\itemsModel', 'items_id');
    }
}
