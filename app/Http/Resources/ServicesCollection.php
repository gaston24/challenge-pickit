<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicesCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'services';

    public function toArray($request)
    {
        return [
            'id' => $this->id ? $this->id : "",
            'descripcion' => $this->descripcion ? $this->descripcion : "",
            'costo' => $this->costo ? $this->costo : "",
        ];
    }
}
