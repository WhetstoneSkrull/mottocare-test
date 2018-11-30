<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  public function servicerender(){
    return $this->belongsToMany('App\ServiceRender');
  }
  public function category(){
      return $this->belongsTo('App\ServiceCategory');
    }
    public function bookings(){
      return $this->hasMany('App\Booking');
    }
}
