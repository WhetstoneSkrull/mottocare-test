<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
  public function auto(){
    return $this->belongsTo('App\Automobile','automobile_id');
  }
  public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function car(){
          return $this->belongsTo(Car::class,'car_id');
      }

    public function service(){
      return $this->belongsToMany('App\Service','service_vehicles');
    }
}
