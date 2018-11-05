<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Vehicle extends JsonResource
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
       'vehicle_category_id' => $this->vehicle_category_id,
       'vehicle_make' => $this->vehicle_make,
       'chasis_no' => $this->chasis_no,
       'model' => $this->model,
       'vehicle_reg_no' => $this->vehicle_reg_no,
       'year' => $this->year

     ];
     }
}
