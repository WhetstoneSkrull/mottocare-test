<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ServiceCategory extends JsonResource
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
       'service_category_name' => $this->service_category_name
     ];
     }
}
