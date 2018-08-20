<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'attempts',
        'points',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
