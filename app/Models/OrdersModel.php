<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable=['order_date','total_products','sub_total'];


    // public function items_rltn()
    // {
    //     return $this->belongsTo('App\Models\itemsModel', 'items_id');
    // }
}
