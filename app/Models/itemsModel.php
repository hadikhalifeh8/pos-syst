<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemsModel extends Model
{
    use HasFactory;


    protected $table = 'items';
    protected $fillable=['category_id','name','price','image'];



    public function cat_rltn()
{
    return $this->belongsTo('App\Models\categoriesModel', 'category_id');
}
}
