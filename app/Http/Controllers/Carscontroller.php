<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Auth;

class Carscontroller extends Controller
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
    //  return response()->json(Car::with(['servicecars'])->get(),200);
      return response()->json(Car::all(),200);

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
      $car = $request->isMethod('put') ? Car::findOrfail
        ($request->car_id) : new Car;

        $car->id = $request->input('car_id');
        //$car->user_id =  Auth::user()->id;
        $car->car_manufacturer = $request->input('car_manufacturer');
        $car->save();
        //$car->servicecars()->sync($request->service_ren, false);

        return response()->json([
                    'status' => (bool) $car,
                    'data'   => $car,
                    'message' => $car ? 'Car Created!' : 'Error Creating Car'
                ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
