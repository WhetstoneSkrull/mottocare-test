<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  public function servicecars(){
    return $this->belongsToMany('App\Service', 'service_cars');
  }

  public function vehicles(){
    return $this->hasMany('App\Vehicle');
  }

}
