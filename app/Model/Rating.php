<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Restaurant;
use App\User;

class Rating extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
