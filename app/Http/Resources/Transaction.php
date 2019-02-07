<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Transaction extends JsonResource
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
      'wallet_id' => $this->wallet_id,
      'balance' => $this->balance,
      'transaction_type' => $this->transaction_type,
      'amount' => $this->amount
    ];
    }
}
