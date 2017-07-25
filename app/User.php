<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use Notifiable;

    // Enable soft deletes for this class
    use SoftDeletes;

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


     public function roles()
    {
        return $this->belongsTo('App\Role');
    }

    use HasApiTokens, Notifiable;

}

