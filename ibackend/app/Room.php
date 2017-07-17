<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function notes() {
    	return $this->morphMany('App\Note', 'noteable');
    }

    public function sites() {
    	return $this->hasMany('App\Site');
    }
}


