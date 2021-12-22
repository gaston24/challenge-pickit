<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Owner;

class OwnerController extends BaseController
{
    public function index(){
        
        try {
            $data =  Owner::all();
            return $this->sendResponse(true, $data, "List owners");
        } catch (\Throwable $th) {
            return $this->sendResponse(false, $th, "Error");
        }

        
    }

    public function update(Request $request, $id){

        $ownerUpdate = Owner::find($id);

        $ownerUpdate['apellido'] = $request->apellido;
        $ownerUpdate['nombre'] = $request->nombre;

        try {
            $ownerUpdate->update();
            return $this->sendResponse(true, $ownerUpdate, 'The owner has been updated successfully');
        } catch (\Throwable $th) {
            return $this->sendResponse(false, $th, "Error");
        }

    }

    public function store(Request $request){
        $form = [
            'apellido' => $request->apellido,
            'nombre' => $request->nombre,
        ];

        
        try {
            $model = Owner::create($form);
            return $this->sendResponse(true, $model->id, 'The owner has been created successfully');
        } catch (\Throwable $th) {
            return $this->sendResponse(false, $th, "Error");
        }
    }

    public function show($id){

        try {
            $data =  Owner::find($id);
            return $this->sendResponse(true, $data, "Show the owner with id: $id");
        } catch (\Throwable $th) {
            return $this->sendResponse(false, $th, "Error");
        }
    }
    
    public function destroy(Owner $owner){

        try {
            $owner->delete();
            return $this->sendResponse(true, "The owner has been deleted", 200);
        } catch (\Throwable $th) {
            return $this->sendResponse(false, $th, "Error");
        }
        
    }
}
