<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    protected $fillable = ['vegetarian', 'vegan', 'nut_allergy', 'lactose_intolerance', 'gluten_intolerance', 'bio_food', 'local_food', 'favorite_food'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
