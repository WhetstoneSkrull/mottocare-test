<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRender extends Model
{
public function user(){
return $this->belongsTo('App\Vendor');

  }
  public function service(){
    return $this->belongsTo('App\Service');
  }

  public function servicecategory(){
    return $this->belongsTo('App\ServiceCategory');
  }

  public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
