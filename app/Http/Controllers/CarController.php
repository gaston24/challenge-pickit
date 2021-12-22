<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CarsCollection;
use App\Models\Car;
use Illuminate\Support\Facades\Log;

class CarController extends BaseController
{
    public function index(){
        
        try {
            $data =  Car::all();
            $collection = CarsCollection::collection($data);
            return $this->sendResponse(true, $collection, "List cars");
        } catch (\Throwable $th) {
            return $this->sendResponse(false, $th, "Error");
        }

        
    }

    public function update(Request $request, $id){

        $carUpdate = Car::find($id);

        $carUpdate['marca'] = $request->marca;
        $carUpdate['modelo'] = $request->modelo;
        $carUpdate['anio'] = $request->anio;
        $carUpdate['patente'] = $request->patente;
        $carUpdate['color'] = $request->color;
        $carUpdate['owner_id'] = $request->owner_id;

        try {
            $carUpdate->update();
            return $this->sendResponse(true, $carUpdate, 'The car has been updated successfully');
        } catch (\Throwable $th) {
            Log::warning($th);
            return $this->sendResponse(false, $th, "Error");
        }

    }

    public function store(Request $request){
        $form = [
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anio' => $request->anio,
            'patente' => $request->patente,
            'color' => $request->color,
            'owner_id' => $request->owner_id,
        ];

        
        try {
            $model = Car::create($form);
            return $this->sendResponse(true, $model->id, 'The car has been created successfully');
        } catch (\Throwable $th) {
            Log::warning($th);
            return $this->sendResponse(false, $th, "Error");
        }
    }

    public function show($id){

        try {
            $data =  Car::find($id);
            $collection = new CarsCollection($data);
            return $this->sendResponse(true, $collection, "Show the car with id: $id");
        } catch (\Throwable $th) {
            return $this->sendResponse(false, $th, "Error");
        }
    }
    
    public function destroy(Car $car){

        try {
            $car->delete();
            return $this->sendResponse(true, "The car has been deleted", 200);
        } catch (\Throwable $th) {
            Log::warning($th);
            return $this->sendResponse(false, $th, "Error");
        }
        
    }


}
