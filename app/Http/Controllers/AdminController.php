<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//use Carbon\Carbon;
use App\Admin;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class AdminController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response

     */
     /*
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
         $user = $request->admin();
         $tokenResult = $user->createToken('Personal Access Token');
         $token = $tokenResult->token;
         if ($request->remember_me)
             $token->expires_at = Carbon::now()->addWeeks(1);
         $token->save();
         return response()->json([
             'access_token' => $tokenResult->accessToken,
             'token_type' => 'Bearer',
             'expires_at' => Carbon::parse(
                 $tokenResult->token->expires_at
             )->toDateTimeString()
         ]);
     }


*/
//JWT Auth
     public function authenticate(Request $request)
        {
            $credentials = $request->only('email', 'password');

            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 400);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }

            return response()->json(compact('token'));
        }

        public function register(Request $request)
        {
                $validator = Validator::make($request->all(), [
              //  'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            if($validator->fails()){
                    return response()->json($validator->errors()->toJson(), 400);
            }

            $user = Admin::create([
              //  'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);

            $token = JWTAuth::fromUser($user);

            return response()->json(compact('admin','token'),201);
        }

        public function getAuthenticatedUser()
            {
                    try {

                            if (! $user = JWTAuth::parseToken()->authenticate()) {
                                    return response()->json(['user_not_found'], 404);
                            }

                    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                            return response()->json(['token_expired'], $e->getStatusCode());

                    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                            return response()->json(['token_invalid'], $e->getStatusCode());

                    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                            return response()->json(['token_absent'], $e->getStatusCode());

                    }

                    return response()->json(compact('user'));
            }

}
