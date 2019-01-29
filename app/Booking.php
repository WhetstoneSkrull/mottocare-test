<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  public function user(){
   return $this->belongsTo('App\User');
 }

   public function servicerenders(){
        return $this->belongsToMany(ServiceRender::class,'bookings_service_renders');
    }

    public function vendor(){
         return $this->belongsTo(Vendor::class,'vendor_id');
     }

     public function vehicle(){
          return $this->belongsTo(Vehicle::class,'vehicle_id');
      }

     public function slot(){
       return $this->belongsTo(Slot::class,'slot_id');
     }
}
