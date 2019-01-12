<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  public function user(){
   return $this->belongsTo('App\User');
 }

   public function servicerenders(){
        return $this->belongsTo(ServiceRender::class,'service_render_id');
    }

    public function vendor(){
         return $this->belongsTo(Vendor::class,'vendor_id');
     }
     public function slot(){
       return $this->belongsTo(Slot::class,'slot_id');
     }
}
