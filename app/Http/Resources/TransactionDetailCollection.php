<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionDetailCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $serviceCollection = ServicesCollection::collection($this->service_id);
        // $servicesCollection = Service::where('id', $this->services_id)->get();

        return [
            // 'transaction_head_id' => $this->transaction_head_id ? $this->transaction_head_id : "",
            'service_id' => $this->service_id ? $serviceCollection : "",
        ];
    }
}
