<?php

use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::controller(ProductController::class)->group(function(){

    Route::get('products','index');

    Route::get('products/edit/{id}','edit');

    Route::get('products/search','search');

    Route::get('products/filter','filter');

    Route::post('products/store','store');

    Route::put('products/{id}','update');

    Route::delete('products/{id}','delete');

    Route::get('categories','categories');

});

Route::controller(ContactController::class)->group(function(){

    Route::get('contacts','index');

    Route::post('contacts/store','store');


    Route::delete('contacts/{id}','delete');


});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
