<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\TransactionDetailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/test', function () {
    echo 'hola mundo';
});

Route::resource('/cars', CarController::class);
Route::resource('/owners', OwnerController::class);
Route::resource('/services', ServicesController::class);


Route::resource('/transactions', TransaccionController::class);
Route::resource('/transactionsDetails', TransactionDetailController::class);
