<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ServicesCollection;
use App\Models\Service;
use Illuminate\Support\Facades\Log;

class ServicesController extends BaseController
{
    public function index(){
        
        try {
            $data =  Service::all();
            $collection = ServicesCollection::collection($data);
            return $this->sendResponse(true, $collection, "List services");
        } catch (\Throwable $th) {
            return $this->sendResponse(false, $th, "Error");
        }

        
    }

    public function update(Request $request, $id){

        $serviceUpdate = Service::find($id);

        $serviceUpdate['descripcion'] = $request->descripcion;

        try {
            $serviceUpdate->update();
            return $this->sendResponse(true, $serviceUpdate, 'The service has been updated successfully');
        } catch (\Throwable $th) {
            Log::warning($th);
            return $this->sendResponse(false, $th, "Error");
        }

    }

    public function store(Request $request){
        $form = [
            'descripcion' => $request->descripcion,
        ];

        
        try {
            $model = Service::create($form);
            return $this->sendResponse(true, $model->id, 'The service has been created successfully');
        } catch (\Throwable $th) {
            Log::warning($th);
            return $this->sendResponse(false, $th, "Error");
        }
    }

    public function show($id){

        try {
            $data =  Service::find($id);
            $collection = new ServicesCollection($data);
            return $this->sendResponse(true, $collection, "Show the service with id: $id");
        } catch (\Throwable $th) {
            return $this->sendResponse(false, $th, "Error");
        }
    }
    
    public function destroy(Service $service){

        try {
            $service->delete();
            return $this->sendResponse(true, "The service has been deleted", 200);
        } catch (\Throwable $th) {
            Log::warning($th);
            return $this->sendResponse(false, $th, "Error");
        }
        
    }
}
