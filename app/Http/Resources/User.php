<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'name' => $this->name,
      'email' => $this->email,
      'customer_id' => $this->customer_id,
      'user_role' => $this->user_role,
      'mobile_no' => $this->mobile_no,
      'account_pic' => $this->account_pic,
      'address' => $this->address,
      'Dob' => $this->Dob,
      'lga' => $this->lga,
      'city' => $this->city,
      'state' => $this->state

    ];
    }
}
