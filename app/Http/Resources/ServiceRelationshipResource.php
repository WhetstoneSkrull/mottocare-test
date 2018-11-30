<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceRelationshipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
     public function toArray($request)
    {
        return [
            'category'   => [
                'links' => [
                    'self'    => route('service.relationships.category', ['service' => $this->id]),
                    'related' => route('service.author', ['service' => $this->id]),
                ],
                'data'  => new CategoryIdentifierResource($this->category),
            ]
        ];
    }
    public function with($request)
    {
        return [
            'links' => [
                'self' => route('articles.index'),
            ],
        ];
    }
}
