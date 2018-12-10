<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Driver extends JsonResource
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
      'driver_first_name' => $this->driver_first_name,
      'driver_last_name' => $this->driver_last_name,
      'driver_dob' => $this->driver_dob,
      'driving_license_no' => $this->driving_license_no,
      'driving_license_expiry_date' => $this->driving_license_expiry_date,
      'contact_no' => $this->contact_no,
      'email' => $this->email,
      'license_pic' => $this->license_pic,
      'driver_pic' => $this->driver_pic
    ];
    }
}
