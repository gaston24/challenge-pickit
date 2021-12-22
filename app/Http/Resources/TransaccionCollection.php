<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Car;
use App\Models\Service;

class TransaccionCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'transactions';

    public function toArray($request)
    {
        $carsCollection = Car::find($this->coche_id);
        $servicesCollection = Service::where('id', $this->services_id)->get();

        return [
            'id' => $this->id ? $this->id : "",
            'coche_id' => $this->coche_id ? $carsCollection : "",
            'services_id' => $this->services_id ? $servicesCollection : "",
            'costo_total' => $this->costo_total ? $this->costo_total : "",
        ];
    }
}
