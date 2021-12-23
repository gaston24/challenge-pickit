<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TransactionDetailCollection;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Log;

class TransactionDetailController extends BaseController
{

    public function index(){
        
        try {
            $data =  TransactionDetail::all();
            return $data;
        } catch (\Throwable $th) {
            return $this->sendResponse(false, $th, "Error");
        }

        
    }

    public function update(Request $request, $id){

        $transactionDetailUpdate = TransactionDetail::find($id);

        $transactionDetailUpdate['transaction_head_id'] = $request->transaction_head_id;
        $transactionDetailUpdate['service_id'] = $request->service_id;

        try {
            $transactionDetailUpdate->update();
            return $this->sendResponse(true, $transactionDetailUpdate, 'The transaction detail has been updated successfully');
        } catch (\Throwable $th) {
            Log::warning($th);
            return $this->sendResponse(false, $th, "Error");
        }

    }

    public function storeArray($request){

        try {
            foreach ($request['service_id'] as $service) {
                TransactionDetail::create([
                    'transaction_head_id' => $request['transaction_head_id'],
                    'service_id' => $service,
                ]);
            }
            return true;
        } catch (\Throwable $th) {
            Log::warning($th);
            return false;
        }
    }

    public function show($id){

        try {
            $data =  TransactionDetail::find($id);
            $collection = new TransactionDetailCollection($data);
            return $this->sendResponse(true, $collection, "Show the transaction detail with id: $id");
        } catch (\Throwable $th) {
            return $this->sendResponse(false, $th, "Error");
        }
    }
    
    public function destroy(TransactionDetail $transactionDetail){

        try {
            $transactionDetail->delete();
            return $this->sendResponse(true, "The transaction detail has been deleted", 200);
        } catch (\Throwable $th) {
            Log::warning($th);
            return $this->sendResponse(false, $th, "Error");
        }
        
    }

}
