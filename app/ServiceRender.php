<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRender extends Model
{
public function user(){
return $this->belongsTo('App\Vendor');

  }
  public function service(){
    return $this->belongsToMany('App\Service');
  }

  public function servicecategory(){
    return $this->belongsToMany('App\ServiceCategory');
  }
  public function engine(){
    return $this->belongsToMany('App\Engine');
  }
  public function automobile(){
    return $this->belongsToMany('App\Automobile');
  }
}
