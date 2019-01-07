<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Booking;
use App\Http\Resources\User as UserResource;

class AuthController extends Controller
{
  /**
   * Create user
   *
   * @param  [string] name
   * @param  [string] email
   * @param  [string] password
   * @param  [string] password_confirmation
   * @return [string] message
   */
public function allusers(){

  $users = User::orderBy('created_at','desc')->paginate(15);
    return UserResource::collection($users);
}
/*
public function showuser($id){
  $user = User::findOrfail($id);
  return new  UserResource($user);
} */

//returns all users and their bookings
public function index(){
      return response()->json(User::with(['bookings'])->get(), 200);
  }

  //returns a user and their bookings and services
  public function showBookingsServices(User $user)
      {
          return response()->json($user->bookings()->with(['servicerenders'])->get(),200);
      }

      //returns a user and their bookings
      public function showBookings(User $user)
          {
              return response()->json($user->bookings()->get(),200);
          }

//returns a user and their vehicles
public function showVehicles(User $user)
    {
        return response()->json($user->vehicles()->with(['user'])->get(),200);
    }

  //returns a user and their vehicles
  public function showDrivers(User $user)
      {
          return response()->json($user->drivers()->with(['user'])->get(),200);
      }

      //returns a user and their services rendered
      public function showServices(User $user)
          {
              return response()->json($user->servicerenders()->with(['service','servicecategory'])->get(),200);
          }

      //returns the details of a user
  public function showUser(User $user)
        {
            return response()->json($user,200);
        }

  public function signup(Request $request)
  {
      $request->validate([
          'first_name' => 'required|string',
          'last_name' => 'required|string',
        //  'customer_id' => 'required|string',
          'email' => 'required|string|email|unique:users',
          'password' => 'required|string|confirmed'
      //    'role' => 'required|string'
      ]);

      //Default profile pic
      $pic_path = ('customer.jpg');

    //Generate Customer ID
    //  $booking = new User('id'=>'1');
      $first = ('MCC');
      $last = ('000');
      $bid = $request->id;
      $addID = $first.$last.$bid;

        //Concatenate Slug for each User
      $first = $request['first_name'];
      $last = $request['last_name'];
      $email = $request['email'];
      $add = $first.$last.$email;

      //Generate Random string for each user
      $length = 100;
      $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);


      $user = new User([
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'slug'=>$add,
          'token'=>$randomString,
          'customer_id'=>$addID,
          'account_pic' => $pic_path,
          'email' => $request->email,
          'user_role' => $request->role,
          'password' => bcrypt($request->password)
      ]);
      $user->save();
      return response()->json([
          'message' => 'Successfully created user!'
      ], 201);
  }

  /**
   * Login user and create token
   *
   * @param  [string] email
   * @param  [string] password
   * @param  [boolean] remember_me
   * @return [string] access_token
   * @return [string] token_type
   * @return [string] expires_at
   */
   public function login(Request $request)
     {
         $request->validate([
             'email' => 'required|string|email',
             'password' => 'required|string',
             'remember_me' => 'boolean'
         ]);

         $credentials = request(['email', 'password']);

         if(!Auth::attempt($credentials))
             return response()->json([
                 'message' => 'Unauthorized'
             ], 401);

         $user = $request->user();

         $tokenResult = $user->createToken('Personal Access Token');
         $token = $tokenResult->token;

         if ($request->remember_me)
             $token->expires_at = Carbon::now()->addWeeks(1);

         $token->save();

         return response()->json([
             'access_token' => $tokenResult->accessToken,
             'token_type' => 'Bearer',
             'user' => Auth::user(),
             'expires_at' => Carbon::parse(
                 $tokenResult->token->expires_at
             )->toDateTimeString()
         ]);
     }


  /**
   * Logout user (Revoke the token)
   *
   * @return [string] message
   */
  public function logout(Request $request)
  {
      $request->user()->token()->revoke();
      return response()->json([
          'message' => 'Successfully logged out'
      ]);
  }

  /**
   * Get the authenticated User
   *
   * @return [json] user object
   */
      public function user(Request $request)
      {
          return response()->json($request->user());
      }
}
