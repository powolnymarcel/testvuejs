<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //Permettra de transformer les valeur numérique : 1 & 0 en true ou flase
  public function getCompletedAttribute($value)
  {
      if ($value){
          return true;
      }
      return false;

  }
}
