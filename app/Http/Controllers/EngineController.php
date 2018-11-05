<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Engine;
use App\Http\Resources\Engine as EngineResource;

class EngineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $engines = Engine::orderBy('created_at','desc')->paginate(15);
        return EngineResource::collection($engines);
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
      $engine = $request->isMethod('put') ? Engine::findOrfail
        ($request->engine_id) : new Engine;

        $engine->id = $request->input('engine_id');
        $engine->name = $request->input('name');

        if($engine->save()){
          return new EngineResource($engine);
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
      $engine = Engine::findOrfail($id);
      return new  EngineResource($engine);
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
      $engine = Engine::findOrfail($id);
    if($engine->delete()){
      return new  EngineResource($engine);

        }
    }
}
