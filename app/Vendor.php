<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function servicerender()
    return $this->hasMany('App\ServiceRender');
}
