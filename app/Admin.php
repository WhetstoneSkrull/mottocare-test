<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
//use Illuminate\Foundation\Auth\Admin as Authenticatable;
use Illuminate\Foundation\Auth\Admin as Authenticatable;


use Tymon\JWTAuth\Contracts\JWTSubject;
//use Laravel\Passport\HasApiTokens;


//class Admin extends Authenticatable

class Admin extends Authenticatable implements JWTSubject
{
  use Notifiable;
// The authentication guard for admin
    protected $guard = 'admin';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'email', 'password',
    ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
        {
            return $this->getKey();
        }
        public function getJWTCustomClaims()
        {
            return [];
        }
        public function role(){
          return $this->belongsTo('App\Role');
        }
}
