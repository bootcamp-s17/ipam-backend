<?php

namespace App;

use App\Site;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function noteable () {
    	return $this->morphTo();
    }

    static function getNotes ($model, $id){
      $model = $model::find($id);
      $modelNotes = array();
      foreach ($model->notes as $note) {
         if ($note){
            array_push($modelNotes, $note->text);
         }
         
      }
      return $modelNotes;
    }
}
