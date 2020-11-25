<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function ($customers) {
            return new CustomerResource($customers);
        });

        return parent::toArray($request);
    }
}
