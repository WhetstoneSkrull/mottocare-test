<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slot;
use App\Http\Resources\Slot as SlotResource;


class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slots = Slot::all();
        return SlotResource::collection($slots);
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
      $slot = $request->isMethod('put') ? Slot::findOrfail
        ($request->slot_id) : new Slot;

        $slot->id = $request->input('slot_id');
        //$auto->user_id = $request->input('user_id');
        $slot->slot_name = $request->input('slot_name');


        if($slot->save()){
          return new SlotResource($slot);
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
      $slot = Slot::findOrfail($id);
    if($slot->delete()){
      return new  SlotResource($slot);

        }
    }
}
