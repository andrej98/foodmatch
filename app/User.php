<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Model\Preferences;
use App\Model\Like;
use App\Model\Rating;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function preferences()
    {
        return $this->hasOne(Preferences::class);
    }

    public function groups()
    {
        return $this->belongsToMany(\App\Model\Group::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
