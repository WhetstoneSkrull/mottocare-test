<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Booking extends JsonResource
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
       'agent_id' => $this->agent_id,
       'vehicle_id' => $this->vehicle_id,
       'booking_no' => $this->booking_no,
       'service_date' => $this->service_date,
       'service_time' => $this->service_time
     ];
     }
}
