<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  public function user(){
   return $this->belongsTo('App\User');
 }
//Hello branch
   public function servicerenders(){
        return $this->belongsTo(ServiceRender::class,'service_render_id');
    }

    public function vendor(){
         return $this->belongsTo(Vendor::class,'vendor_id');
     }
}
