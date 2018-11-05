<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
  public function servicerender(){
    return $this->belongsToMany('App\ServiceRender');
  }
}
