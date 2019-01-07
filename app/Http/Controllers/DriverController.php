<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use Auth;
use App\Http\Resources\Driver as DriverResource;

class DriverController extends Controller
{
  public function __construct()
    {
      $this->middleware('auth:api');
      //  $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $drivers = Driver::orderBy('created_at','desc')->paginate(15);
        return DriverResource::collection($drivers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $driver = $request->isMethod('put') ? Driver::findOrfail
        ($request->driver_id) : new Driver;

        $driver->id = $request->input('driver_id');
        $driver->user_id = Auth::user()->id;
        $driver->driver_first_name = $request->input('driver_first_name');
        $driver->driver_last_name = $request->input('driver_last_name');
        $driver->driver_dob = $request->input('driver_dob');
        $driver->driving_license_no = $request->input('driving_license_no');
        $driver->driving_license_expiry_date = $request->input('driving_license_expiry_date');
        $driver->contact_no = $request->input('contact_no');
        $driver->email = $request->input('email');
        $driver->license_pic = $request->input('license_pic');
        $driver->driver_pic = $request->input('driver_pic');

        if($driver->save()){
          return new DriverResource($driver);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $driver = Driver::findOrfail($id);
      return new  DriverResource($driver);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $driver = Driver::findOrfail($id);
    if($driver->delete()){
      return new  DriverResource($driver);

        }
    }
}
