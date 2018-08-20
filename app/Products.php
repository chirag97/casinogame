<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
protected $fillable = [
'id',
'user_id',
'name',
'price',
'price_in_points',
'image',
'available_in_stock',
];


public function user()
{
    return $this->belongsToMany('App\User','orders','product_id','user_id');
}

}
