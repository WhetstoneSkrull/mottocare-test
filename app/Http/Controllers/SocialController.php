<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\User;
//use Auth;

class SocialController extends Controller
{
    public function GoogleRedirectToProvider()
  {
    return Socialite::driver('google')->redirect();
  }
  /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function GoogleHandleProviderCallback()
    {
      // $user = Socialite::driver('google')->stateless()->user();
    //   return $user->name;
    $pic_path = ('/default.png');
               $googleUser = Socialite::driver('google')->stateless()->user();
               $existUser = User::where('email',$googleUser->email)->first();


               if($existUser) {
                   Auth::loginUsingId($existUser->id);
               }
               else {
                   $user = new User;
                   $user->first_name = $googleUser->name;
                   $user->last_name = $googleUser->name;
                   //$user->slug = $googleUser->name;
                   $user->account_pic = $pic_path;
                   $user->email = $googleUser->email;
                   $user->customer_id = ('MCC00');
                   $user->activation_token =  str_random(60);
                   $user->password = md5(rand(1,10000));
                   $user->active = true;
                   $user->save();
                   Auth::loginUsingId($user->id);
               }
               return redirect('/dashboard');
    }

}
