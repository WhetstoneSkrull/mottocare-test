<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceCategory;
use App\Http\Resources\ServiceCategory as ServiceResource;


class ServiceCategoryController extends Controller
{
  public function index()
  {
  //  $services = ServiceCategory::orderBy('created_at','desc')->paginate(15);
    //  return ServiceResource::collection($services);
    return response()->json(ServiceCategory::with(['services'])->get(),200);

  }

  public function store(Request $request)
  {
    $service = $request->isMethod('put') ? ServiceCategory::findOrfail
      ($request->service_category_id) : new serviceCategory;

      $service->id = $request->input('service_category_id');
      $service->service_category_name = $request->input('service_category_name');

      if($service->save()){
        return new ServiceResource($service);
      }
  }

  public function show($id)
  {
    $service = ServiceCategory::findOrfail($id);
    return new  ServiceResource($service);
  }

  public function destroy($id)
  {
    $service = ServiceCategory::findOrfail($id);
  if($service->delete()){
    return new  ServiceResource($service);

      }
  }

}
