<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    //Allows us to not hard delete everything
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'abbreviation','address', 'site_contact'];
    //Specifying the join relationships
    
    public function subnets(){
        return $this->hasMany('App\Subnet');
    }
    
    public function equipments(){
        return $this->hasMany('App\Equipment');
    }
    
    public function notes(){

        return $this->morphMany('App\Note', 'noteable');;

    }
    
    public function rooms(){
        return $this->hasMany('App\Room');
    }

    
}
