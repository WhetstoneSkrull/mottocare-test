<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  public function servicerender(){
    return $this->belongsToMany('App\ServiceRender');
  }
}
