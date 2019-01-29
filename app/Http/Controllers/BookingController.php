<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Auth;
use App\User;
use App\Notifications\PayBooking;

use App\Http\Resources\Booking as BookingResource;


class BookingController extends Controller
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
      $bookings = Booking::orderBy('created_at','desc')->paginate(25);
        return BookingResource::collection($bookings);
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
      $booking = $request->isMethod('put') ? Booking::findOrfail
        ($request->booking_id) : new Booking;

        //Generate booking_id
        $first = ('MCB');
        $last = ('00');
        $add = $first.$last;

        $booking->id = $request->input('booking_id');
        $booking->user_id =  Auth::user()->id;
        $booking->vehicle_id = $request->input('vehicle_id');
        $booking->booking_no = $add;
        $booking->service_date = $request->input('service_date');
        $booking->service_time = $request->input('service_time');
        $booking->vendor_id = $request->input('vendor_id');
        $booking->slot_id = $request->input('slot_id');

        $booking->save();
        $booking->servicerenders()->sync($request->service_renders, false);

        /* $user = User::where('email', Auth::user()->email)->first();
          $user->notify(new PayBooking($user));
          return new BookingResource($booking);  */
        return response()->json([
                    'status' => (bool) $booking,
                    'data'   => $booking,
                    'message' => $booking ? 'Booking Created!' : 'Error Creating Booking'
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
      $booking = Booking::findOrfail($id);
      return new  BookingResource($booking);
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
      $booking = Booking::findOrfail($id);
      if($booking->delete()){
      return new  BookingResource($booking);

        }
    }
}
