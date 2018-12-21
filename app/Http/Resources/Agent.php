<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Agent extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return[
      'id' => $this->id,
      'user_id' => $this->user_id,
      'agent_first_name' => $this->agent_first_name,
      'agent_last_name' => $this->agent_last_name,
      'agent_email' => $this->agent_email,
      'agent_category' => $this->agent_category,
      'agent_pic' => $this->agent_pic,
      'commission' => $this->commission,
      'state' => $this->state,
      'lga' => $this->lga,
      'address' => $this->address,
      'status' => $this->status
        ];
      }


}
