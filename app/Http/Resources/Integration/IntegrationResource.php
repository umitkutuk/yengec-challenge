<?php

namespace App\Http\Resources\Integration;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Integration
 */
class IntegrationResource extends JsonResource
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
            'id' => $this->id,
            'username' => $this->username,
            'passport' => $this->passport,
            'customer' => $this->whenLoaded('customer', function () {
                return [
                    'id' => $this->customer->id,
                    'name' => $this->customer->name,
                ];
            }),
            'integrationType' => $this->whenLoaded('integrationType', function () {
                return [
                    'id' => $this->integrationType->id,
                    'name' => $this->integrationType->name,
                ];
            })
        ];
    }
}
