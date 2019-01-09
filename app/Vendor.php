<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function user(){
    return $this->belongsTo('App\User');
  }

  public function bookings(){
    	return $this->hasMany('App\Booking');
    }

    public function servicerenders(){
      	return $this->hasMany('App\ServiceRender');
      }
      
}
