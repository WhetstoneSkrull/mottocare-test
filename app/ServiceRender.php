<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRender extends Model
{
public function user(){
return $this->belongsTo('App\User', 'user_id');
  }

  public function service() {
    return $this->belongsTo('App\Service', 'service_id');
  }

  public function servicecategory(){
    return $this->belongsTo('App\ServiceCategory', 'service_category_id');
  }

  public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function vendor(){
          return $this->belongsTo(Vendor::class,'vendor_id');
      }
}
