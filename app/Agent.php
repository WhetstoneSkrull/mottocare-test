<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class Agent extends Model
class Agent extends Authenticatable

{
  use Notifiable;
// The authentication guard for admin
    protected $guard = 'agent';

    protected $fillable = [
        'email', 'password', 'agent_category','address','state', 'commission',
        'target', 'deposits', 'first_name', 'last_name','agent_id','lga','agent_pic',
    ];

}
