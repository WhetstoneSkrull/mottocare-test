<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Booking;
use App\Vendor;
use DB;

use App\Notifications\SignupActivate;

use App\Http\Resources\User as UserResource;

class AuthController extends Controller
{
  public function __construct()
    {
      $this->middleware('auth:api');
      //  $this->middleware('isAdmin');
    }

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
  public function allUserData(User $user)
      {
          return response()->json($user->with(['servicerenders','vendor','drivers','bookings'])->get(),200);
        //  return response()->json($user->with(['servicerenders','vendor','drivers','bookings'])->get(),200);
      }


  //returns a user and their bookings and services
  public function showBookingsServices(User $user)
      {
          return response()->json($user->servicerenders()->with(['bookings'])->get(),200);
          //return response()->json($user->bookings()->with(['servicerenders'])->get(),200);
      }

      //returns a user and their bookings
      public function showBookings(User $user)
          {
              return response()->json($user->bookings()->with(['servicerenders','vendor','vehicle'])->get(),200);
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


      //returns a vendor and their services rendered
      public function showVendorServices(Vendor $user)
          {
              return response()->json($user->servicerenders()->with(['service','servicecategory'])->get(),200);
          }

          //returns a user's vendor details
          public function showVendor(User $user){
                return response()->json($user->vendor()->get(),200);

            }

            //returns a user's vendor details
            public function showVendorBookings(Vendor $user){
                  return response()->json($user->bookings()->with(['servicerenders','user'])->get(),200);

              }

              //returns a user's services details
              public function showUserServices(User $user){
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
          'password' => bcrypt($request->password),
          'activation_token' => str_random(60)

      ]);
      $user->save();
//      $user->notify(new SignupActivate($user));

      return response()->json([
          'message' => 'Successfully created user!'
      ], 201);
  }

  public function signupActivate($token)
  {
      $user = User::where('activation_token', $token)->first();
      if (!$user) {
          return response()->json([
              'message' => 'This activation token is invalid.'
          ], 404);
      }
      $user->active = true;
      $user->activation_token = '';
      $user->save();
      return $user;
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

      //   $credentials['active'] = 1;
        // $credentials['deleted_at'] = null;

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

      public function updateAccount(Request $request){

             $user_id = Auth::user()->id;
        DB::table('users')->where('id', $user_id)->update($request->except('_token'));


        return response()->json([
            'response' => 'user updated Successfully',
            'user' => Auth::user()
        ]);



    }

    public function uploadFile(Request $request)
  {
    if ($request->hasFile('account_pic')) {
             $image = $request->file('account_pic');
             $filename = time() . '.' . $image->getClientOriginalExtension();
             $location = public_path('images/' . $filename);
             Image::make($image)->resize(400, 200)->save($location);
           }
     else{
         $filename= 'noimage.jpg';
     }

  }

}
