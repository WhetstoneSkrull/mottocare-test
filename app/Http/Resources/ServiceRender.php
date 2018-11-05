<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceRender extends JsonResource
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
       'service_category_id' => $this->service_category_id,
       'service_id' => $this->service_id,
       'engine_id' => $this->engine_id,
       'automobile_id' => $this->automobile_id,
       'capacity_id' => $this->capacity_id,
       'manpower' => $this->manpower,
       'description' => $this->description

     ];
     }
}
