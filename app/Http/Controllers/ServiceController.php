<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceCategory;
use App\Http\Resources\Service as ServiceResource;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      // $categories = ServiceCategory::all();
      //$services = Service::orderBy('created_at','desc')->paginate(15);
      //return ServiceResource::collection($services);
      // return response()->json(Service::with(['category','servicecars'])->get(), 200);
       return response()->json(Service::all(), 200);

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
    //  $categories =ServiceCategory::all();
      $service = $request->isMethod('put') ? Service::findOrfail
        ($request->service_id) : new service;

        $service->id = $request->input('service_id');
        $service->service_name = $request->input('service_name');
        $service->service_category_id = $request->service_category_id;

        $service->save();
        $service->servicecars()->sync($request->service_cars, false);

        return response()->json([
                    'status' => (bool) $service,
                    'data'   => $service,
                    'message' => $service ? 'Service Created!' : 'Error Creating Service'
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
      $service = Service::findOrfail($id);
      return new  ServiceResource($service);
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
      $service = Service::findOrfail($id);
    if($service->delete()){
      return new  ServiceResource($service);

        }
    }
}
