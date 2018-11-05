<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Http\Resources\Booking as BookingResource;


class BookingController extends Controller
{
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

        $first = ('MCB');
        $last = ('000');
      //  $bid = $booking->id;
        $add = $first.$last.$bid;

        $booking->id = $request->input('booking_id');
        $booking->user_id = $request->input('user_id');
        $booking->agent_id = $request->input('agent_id');
        $booking->vehicle_id = $request->input('vehicle_id');
        $booking->booking_no = $add;
        $booking->service_date = $request->input('service_date');
        $booking->service_time = $request->input('service_time');

        if($booking->save()){
          return new BookingResource($booking);
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
