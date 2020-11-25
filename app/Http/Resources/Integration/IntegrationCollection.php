<?php

namespace App\Http\Resources\Integration;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IntegrationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function ($integrations) {
            return new IntegrationResource($integrations);
        });

        return parent::toArray($request);
    }
}
