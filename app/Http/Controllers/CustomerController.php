<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class CustomerController extends Controller
{
  public function __construct()
{
    $this->middleware('auth',['except' =>['index'] ]);
}
       public function index($slug){

            $user_id = auth()->user()->id;
            $user = User::where('slug', $slug)->first();
          $userData= DB::table('users')->where('slug', $slug)->get();
          return view('customers.index', compact('userData'))->with('data', Auth::user()->id);
  }
}
