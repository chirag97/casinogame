<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'sale_status',
    ];

}
