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
    protected $fillable = ['name', 'equipment_type_id','model', 'driver', 'serial_number','ip_address','site_id','host_name','port_number','mac-address','mab','printer_server','printer_name','share_name','share_comment'];
    //Specifying the join relationships
    
    public function equipment_type(){
        return $this->belongsTo('App\EquipmentType');
    }

    public function notes(){
        return $this->morphMany('App\Note', 'noteable');
    }
    public function site(){
        return $this->belongsTo('App\Site');
    }


}


