<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Car;
use App\Models\TransactionDetail;
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
        $details = TransactionDetail::
        
                                where('transaction_head_id', '>', 30)
                                ->get();

        // dump($details);

        // $servicesCollection = Service::where('id', $details->services_id)->get();

        return [
            'id' => $this->id ? $this->id : "",
            'coche_id' => $this->coche_id ? $carsCollection : "",
        ];
    }
}
