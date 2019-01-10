<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends \TCG\Voyager\Models\User
{
    use Notifiable, HasApiTokens, SoftDeletes;

    protected $dates = ['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      //'user_role',
        'first_name','last_name','slug','account_pic','driver_license','customer_id','DoB','address', 'email', 'password', 'token',
        'driver_first_name','driver_last_name','lga','city','state','active', 'activation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];

    public function vehicles()
    {
      return $this->hasMany('App\Vehicle');
    }
    public function bookings()
    {
      return $this->hasMany('App\Booking');
    }
    public function drivers(){
      return $this->hasMany('App\Driver');
    }
    public function vendor()
      {
        return $this->hasOne('App\Vendor');
      }

      public function servicerenders()
        {
          return $this->hasMany('App\ServiceRender');
        }
}
