<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  public function user(){
   return $this->belongsTo('App\User');
 }

 public function vendor(){
     return $this->belongsTo('App\Vendor');

   }
   public function service(){
     return $this->belongsTo('App\Service');
   }
}
