<?php

namespace App\Http\Controllers;
use App\Agent;
use Auth;
use App\Http\Resources\Agent as AgentResource;
//use App\Http\Resources\Vendor as VendorResource;


use Illuminate\Http\Request;

class AgentController extends Controller
{
  public function __construct()
    {
      //$this->middleware('auth:api');
      //  $this->middleware('isAdmin');
    }


  public function index()
  {
    $agents = Agent::orderBy('created_at','desc')->paginate(15);
      return AgentResource::collection($agents);
  }

  public function store(Request $request)
  {
    $agent = $request->isMethod('put') ? Agent::findOrfail
      ($request->agent_id) : new Agent;

//      $agentStatus ="pending";
      $agentCat ="bronze";

      $agent->id = $request->input('agent_id');
      $agent->user_id = Auth::user()->id;
      $agent->agent_first_name = $request->input('agent_first_name');
      $agent->agent_last_name = $request->input('agent_last_name');
      $agent->agent_email = $request->input('agent_email');
      $agent->agent_category = $agentCat;
      $agent->agent_pic = $request->input('agent_pic');
      $agent->commission = $request->input('commission');
      $agent->state = $request->input('state');
      $agent->lga = $request->input('lga');
      $agent->address = $request->input('address');
      $agent->status = $request->input('status');

      if($agent->save()){
        return new AgentResource($agent);
      }
  }

}
