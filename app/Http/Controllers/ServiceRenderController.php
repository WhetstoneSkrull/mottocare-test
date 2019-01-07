<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceRender;
use Auth;
use App\Http\Resources\ServiceRender as ServiceResource;


class ServiceRenderController extends Controller
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
      $services = ServiceRender::orderBy('created_at','desc')->paginate(15);
        return ServiceResource::collection($services);
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
      $service = $request->isMethod('put') ? ServiceRender::findOrfail
        ($request->service_render_id) : new serviceRender;

        $service->id = $request->input('service_render_id');
    //    $service->vendor_id = $request->input('vendor_id');
        $service->user_id = Auth::user()->id;
        $service->service_id = $request->input('service_id');
        $service->service_category_id = $request->input('service_category_id');
        //$service->engine_id = $request->input('engine_id');
      //  $service->automobile_id = $request->input('automobile_id');
        //$service->capacity = $request->input('capacity');
        //$service->manpower = $request->input('manpower');
        $service->description = $request->input('description');
        $service->price = $request->input('price');

        if($service->save()){
          return new ServiceResource($service);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function show(ServiceRender $service)
    {
  //    return response()->json($service,200);
        //return response()->json($service->vendor()->with(['servicerenders'])->get(),200);
        return response()->json($service->with(['vendor','service','servicecategory'])->get(),200);

    }

  /*  public function show($id)
    {

        return response()->json($user->drivers()->with(['user'])->get(),200);

      $service = ServiceRender::findOrfail($id);
      return new  ServiceResource($service);
    } */

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
      $service = ServiceRender::findOrfail($id);
    if($service->delete()){
      return new  ServiceResource($service);

        }
    }
}
