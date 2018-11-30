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
       'user_id' => $this->user_id,
       'vendor_id' => $this->vendor_id,
       'service_category_id' => $this->service_category_id,
       'service_id' => $this->service_id,
       'price' => $this->price,
       'description' => $this->description
     ];
     }
}
