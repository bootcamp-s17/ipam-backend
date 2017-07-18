<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    //Allows us to not hard delete everything
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    //Specifying the join relationships
    
    public function subnets(){
        return $this->hasMany('App\Subnet');
    }
    
    public function equipments(){
        return $this->hasMany('App\Equipment');
    }
    
    public function notes(){
        return $this->hasMany('App\Note');
    }
    
    public function rooms(){
        return $this->hasMany('App\Room');
    }

    
}
