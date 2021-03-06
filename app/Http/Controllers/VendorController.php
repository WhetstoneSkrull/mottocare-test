<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use Auth;
use App\User;
use App\Notifications\RegisterVendor;
use App\Http\Resources\Vendor as VendorResource;


class VendorController extends Controller
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

   public function showVendors(Vendor $user)
       {
           return response()->json($user->with(['servicerenders.bookings'])->get(),200);
          // return response()->json($user->servicerenders()->with(['service','servicecategory'])->get(),200);
       }

  public function index()
  {
    $vendors = Vendor::orderBy('created_at','desc')->paginate(15);
      return VendorResource::collection($vendors);
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
    $vendor = $request->isMethod('put') ? Vendor::findOrfail
      ($request->vendor_id) : new Vendor;

      //Generate Vendor ID
      //  $booking = new User('id'=>'1');
        $first = ('Motto');
        $last = ('000');
        $bid = $request->id;
        $addID = $first.$last.$bid;


      $vendor->id = $request->input('vendor_id');
      $vendor->user_id = Auth::user()->id;
      $vendor->vendor_id = $addID;
      $vendor->vendor_title =  $request->input('vendor_title');
      $vendor->vendor_first_name = $request->input('vendor_first_name');
      $vendor->vendor_last_name = $request->input('vendor_last_name');
      //$vendor->vendor_logo = $request->input('vendor_logo');
      $vendor->vendor_email = $request->input('vendor_email');
      $vendor->mobile_no = $request->input('mobile_no');
      $vendor->manager_first_name = $request->input('manager_first_name');
      $vendor->manager_last_name = $request->input('manager_last_name');
      $vendor->manager_email = $request->input('manager_email');
      $vendor->mechanic_first_name = $request->input('mechanic_first_name');
      $vendor->mechanic_last_name = $request->input('mechanic_last_name');
      $vendor->mechanic_nationality = $request->input('mechanic_nationality');
      $vendor->mechanic_dob = $request->input('mechanic_dob');
      $vendor->mechanic_contact_no = $request->input('mechanic_contact_no');
      $vendor->mechanic_image = $request->input('mechanic_image');
      $vendor->address = $request->input('address');
      $vendor->state = $request->input('state');
      $vendor->city = $request->input('city');
      $vendor->lga = $request->input('lga');
      $vendor->capacity = $request->input('capacity');
      $vendor->opening_time = $request->input('opening_time');
      $vendor->closing_time = $request->input('closing_time');
      $vendor->off_day = $request->input('off_day');
      $vendor->membership = $request->input('membership');
    //  $vendor->manpower = $request->input('manpower');
      $vendor->lumpsum = $request->input('lumpsum');
      $vendor->status = $request->input('status');

      if($vendor->save()){

        $user = User::where('email', $vendor->vendor_email)->first();

      //  $user->notify(new RegisterVendor($user));

        return new VendorResource($vendor);
      }
  }

  public function uploadFile(Request $request)
  {
     if($request->hasFile('vendor_logo')){
         $name = time()."_".$request->file('vendor_logo')->getClientOriginalName();
         $request->file('vendor_logo')->move(public_path('images'), $name);
     }
     return response()->json(asset("images/$name"),201);
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function show($id)
  {
    $vendor = Vendor::findOrfail($id);
    return new  VendorResource($vendor);
    //  return response()->json($vendor->with('servicerenders')->get(),200);

  }

  public function approveRequest(Vendor $vendor)
    {
        $vendor->status = ('active');
        $status = $vendor->save();

        return response()->json([
            'status'    => $status,
            'data'      => $vendor,
            'message'   => $status ? 'Approved!' : 'Error'
        ]);
    }

    public function rejectRequest(Vendor $vendor)
      {
          $vendor->status = ('rejected');
          $status = $vendor->save();

          return response()->json([
              'status'    => $status,
              'data'      => $vendor,
              'message'   => $status ? 'Approved!' : 'Error'
          ]);
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
    $vendor = Vehicle::findOrfail($id);
  if($vendor->delete()){
    return new  VendorResource($vendor);

      }
  }
}
