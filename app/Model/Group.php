<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Restaurant;

class Group extends Model
{
    public function users()
    {
        return $this->belongsToMany(\App\User::class);
    }

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
