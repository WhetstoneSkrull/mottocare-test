<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Slot extends JsonResource
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
      'slot_name' => $this->slot_name,
      'slot_status' => $this->slot_status
      ];
    }
}
