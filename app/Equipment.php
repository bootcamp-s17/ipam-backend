<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    //Allows us to not hard delete everything
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'equipments';
    //Specifying the join relationships
    
    public function equipment_type(){
        return $this->belongsTo('App\EquipmentType');
    }
4
    public function notes(){
        return $this->hasMany('App\Note');
    }
    public function site(){
        return $this->belongsTo('App\Site');
    }


}


