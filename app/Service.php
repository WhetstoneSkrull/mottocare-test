<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  public function servicerender(){
    return $this->hasMany('App\ServiceRender');
  }
  public function category(){
      return $this->belongsTo('App\ServiceCategory', 'service_category_id');
    }
    public function bookings(){
      return $this->hasMany('App\Booking');
    }
    public function servicecars(){
      return $this->belongsToMany('App\Car', 'service_cars');
    }
}
