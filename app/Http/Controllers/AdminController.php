<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use Carbon\Carbon;
use App\Admin;
//use JWTAuth;
//use Tymon\JWTAuth\Exceptions\JWTException;


class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:ROLE_ADMIN');
  }



}
