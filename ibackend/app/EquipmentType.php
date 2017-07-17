<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
      public function equipments()
    {
        return $this->hasMany('App\Equipment');
    }
}
