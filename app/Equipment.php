<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    //Allows us to not hard delete everything
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    //Specifying the join relationships
    public function equipment_types(){
    	return $this->belongsTo('App\Equipment_Type');
    };

    public function notes(){
    	return $this->hasMany('App\Note');
    };
    public function sites(){
    	return $this->belongsTo('App\Site');
    };


}


