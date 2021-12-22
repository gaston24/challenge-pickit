<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TransaccionCollection;
use App\Models\Transaccion;
use Illuminate\Support\Facades\Log;

class TransaccionController extends BaseController
{
    public function index(){
        
        try {
            $data =  Transaccion::all();
            $collection = TransaccionCollection::collection($data);
            return $collection;
            return $this->sendResponse(true, $collection, "List transactions");
        } catch (\Throwable $th) {
            return $this->sendResponse(false, $th, "Error");
        }

        
    }

    public function update(Request $request, $id){

        $transaccionUpdate = Transaccion::find($id);

        $transaccionUpdate['coche_id'] = $request->coche_id;
        $transaccionUpdate['costo_total'] = $request->costo_total;

        try {
            $transaccionUpdate->update();
            return $this->sendResponse(true, $transaccionUpdate, 'The transaction has been updated successfully');
        } catch (\Throwable $th) {
            Log::warning($th);
            return $this->sendResponse(false, $th, "Error");
        }

    }

    public function store(Request $request){
        $form = [
            'coche_id' => $request->coche_id,
            'costo_total' => 0,
            'services_id' => $request->services_id
        ];

        
        try {
            $model = Transaccion::create($form);
            return $this->sendResponse(true, $model->id, 'The transaction has been created successfully');
        } catch (\Throwable $th) {
            Log::warning($th);
            return $this->sendResponse(false, $th, "Error");
        }
    }

    public function show($id){

        try {
            $data =  Transaccion::find($id);
            $collection = new TransaccionCollection($data);
            return $this->sendResponse(true, $collection, "Show the transaction with id: $id");
        } catch (\Throwable $th) {
            return $this->sendResponse(false, $th, "Error");
        }
    }
    
    public function destroy(Transaccion $transaccion){

        try {
            $transaccion->delete();
            return $this->sendResponse(true, "The transaction has been deleted", 200);
        } catch (\Throwable $th) {
            Log::warning($th);
            return $this->sendResponse(false, $th, "Error");
        }
        
    }
}
