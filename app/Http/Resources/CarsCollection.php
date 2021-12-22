<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Owner;

class CarsCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'cars';

    public function toArray($request)
    {
        $owner = Owner::find($this->owner_id);
        
        return [
            'id' => $this->id ? $this->id : "",
            'marca' => $this->marca ? $this->marca : "",
            'modelo' => $this->modelo ? $this->modelo : "",
            'anio' => $this->anio ? $this->anio : "",
            'patente' => $this->patente ? $this->patente : "",
            'color' => $this->color ? $this->color : "",
            'owner' => $this->owner_id ? $owner : "",
        ];
    }
}
