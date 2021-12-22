<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Car;

class OwnersCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'owners';

    public function toArray($request)
    {
        $car = car::where('owner_id', $this->id)->get();

        return [
            'apellido' => $this->apellido ? $this->apellido : "",
            'nombre' => $this->nombre ? $this->nombre : "",
            'cars' => $car ? $car : '',
        ];
    }
}
