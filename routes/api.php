<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\CustomerController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/', HomeController::class);

Route::prefix('v1')->group(function(){
    Route::resource('customer', CustomerController::class)->only(['index', 'show', 'store', 'update', 'delete']);

});

Route::prefix('v2')->group(function(){
    Route::resource('customer', CustomerController::class)->only(['show']);

});