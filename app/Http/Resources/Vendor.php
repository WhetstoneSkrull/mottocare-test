<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Vendor extends JsonResource
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
      'vendor_id' => $this->vendor_id,
      'vendor_title' => $this->vendor_title,
      'vendor_first_name' => $this->vendor_first_name,
      'vendor_last_name' => $this->vendor_last_name,
      'vendor_logo' => $this->vendor_logo,
      'vendor_email' => $this->vendor_email,
      'mobile_no' => $this->mobile_no,
      'manager_first_name' => $this->manager_first_name,
      'manager_last_name' => $this->manager_last_name,
      'manager_email' => $this->manager_email,
      'mechanic_first_name' => $this->mechanic_first_name,
      'mechanic_last_name' => $this->mechanic_last_name,
      'mechanic_nationality' => $this->mechanic_nationality,
      'mechanic_dob' => $this->mechanic_dob,
      'mechanic_contact_no' => $this->mechanic_contact_no,
      'mechanic_email' => $this->mechanic_email,
      'mechanic_image' => $this->mechanic_image,
      'address' => $this->address,
      'state' => $this->state,
      'city' => $this->city,
      'lga' => $this->lga,
      'capacity' => $this->capacity,
      'opening_time' => $this->opening_time,
      'closing_time' => $this->closing_time,
      'off_day' => $this->off_day,
      'lumpsum' => $this->lumpsum,
      'status' => $this->status,
      'servicerenders' => ServiceRender::collection($this->servicerenders),
      'slots' => Slot::collection($this->slots),


    ];
    }
}
