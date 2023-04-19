<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Group;
use App\Model\Like;
use App\Model\Rating;

class Restaurant extends Model
{
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

}
