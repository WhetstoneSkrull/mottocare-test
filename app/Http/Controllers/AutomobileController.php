<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Automobile;
use App\Http\Resources\Automobile as AutomobileResource;

class AutomobileController extends Controller
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
      //$autos = Automobile::orderBy('created_at','desc')->paginate(15);
      $autos = Automobile::all();
        return AutomobileResource::collection($autos);
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
      $auto = $request->isMethod('put') ? Automobile::findOrfail
        ($request->auto_id) : new Automobile;

        $auto->id = $request->input('auto_id');
        //$auto->user_id = $request->input('user_id');
        $auto->name = $request->input('name');


        if($auto->save()){
          return new AutomobileResource($auto);
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
      $auto = Automobile::findOrfail($id);
    if($auto->delete()){
      return new  AutomobileResource($auto);

        }
    }
}
