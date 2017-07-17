<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
ues Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function noteable () {
    	return $this->morphTo();
    }
}
