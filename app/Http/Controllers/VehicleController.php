<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use Auth;

use App\Http\Resources\Vehicle as VehicleResource;


class VehicleController extends Controller
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
      $vehicles = Vehicle::orderBy('created_at','desc')->paginate(15);
        return VehicleResource::collection($vehicles);
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
      $vehicle = $request->isMethod('put') ? Vehicle::findOrfail
        ($request->vehicle_id) : new Vehicle;

        $vehicle->id = $request->input('vehicle_id');
        $vehicle->user_id = Auth::user()->id;
      //  $vehicle->vehicle_category_id = $request->input('vehicle_category_id');
        $vehicle->vehicle_make = $request->input('vehicle_make');
        $vehicle->year = $request->input('year');
        $vehicle->model = $request->input('model');
        $vehicle->pic = $request->input('pic');
        $vehicle->vehicle_reg_no = $request->input('vehicle_reg_no');
        $vehicle->chasis_no = $request->input('chasis_no');

/*
        public function uploadFile(Request $request)
       {
           if($request->hasFile('pic')){
               $name = time()."_".$request->file('image')->getClientOriginalName();
               $request->file('image')->move(public_path('images'), $name);
           }
           return response()->json(asset("images/$name"),201);
       }

        if($vehicle->save()){
          return new VehicleResource($vehicle);
        }  */

        if($vehicle->save()){
          return new VehicleResource($vehicle);
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
      $vehicle = Vehicle::findOrfail($id);
      return new  VehicleResource($vehicle);
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
      $vehicle = Vehicle::findOrfail($id);
    if($vehicle->delete()){
      return new  VehicleResource($vehicle);

        }
    }
}
