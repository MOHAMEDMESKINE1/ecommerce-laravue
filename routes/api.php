<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\NewsLetter\NewsLetterController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\CartController;
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
Route::controller(AuthController::class)->group(function(){
    Route::post('/login','login');
    Route::post('/register','register');
    Route::post('/logout','logout');
});
// Route::controller(ProductController::class)->group(function(){

//     Route::get('products','index');

//     Route::get('products/edit/{id}','edit');

//     Route::get('products/search','search');

//     Route::get('products/filter','filter');

//     Route::post('products/store','store');

//     Route::put('products/{id}','update');

//     Route::delete('products/{id}','delete');

//     Route::get('categories','categories');

// });

// Route::controller(ContactController::class)->group(function(){

//     Route::get('contacts','index');

//     Route::get('contacts/count','count');

//     Route::post('contacts/store','store');


//     Route::delete('contacts/{id}','delete');


// });
// Route::controller(NewsLetterController::class)->group(function(){

//     Route::get('letters','index');

//     Route::post('letters/store','store');


//     Route::delete('letters/{id}','delete');


// });
// Route::controller(CategoryController::class)->group(function(){

//     Route::get('categories','index');

//     Route::get('categories/{id}','edit');

//     Route::put('categories/{id}','update');


//     Route::post('categories/store','store');


//     Route::delete('categories/{id}','delete');


// });
// Route::controller(OrderController::class)->group(function(){

//     Route::get('orders','index');

//     Route::get('orders/customers','customers');
//     Route::get('orders/products','products');
//     Route::get('orders/sales','ordersSales');
//     Route::get('orders/status','Payments');

//     Route::get('orders/{id}','show');
    
//     Route::get('orders/search','search');


//     Route::put('orders/{id}','update');


//     Route::post('orders/store','store');


//     Route::delete('orders/{id}','delete');


// });

    Route::controller(CartController::class)->group(function(){
        
        Route::get('carts','getCart');

        Route::post('carts/add','addToCart');

        Route::delete('carts/{id}','delete');
        Route::get('carts/product/{id}','getProductCart');

    });

    Route::controller(ProductController::class)->group(function(){

        Route::get('products','index');
        
        Route::get('products/all','allProducts');
    
        Route::get('products/edit/{id}','edit');
        
        Route::get('products/details/{id}','getDetails');
    
        Route::get('products/search','search');
    
        Route::get('products/filter','filter');
    
        Route::post('products/store','store');
    
        Route::put('products/update/{id}','update');
    
        Route::delete('products/{id}','delete');
    
        Route::get('categories','categories');
    
    });
    
    Route::controller(ContactController::class)->group(function(){
    
        Route::get('contacts','index');
    
        Route::get('contacts/count','count');
    
        Route::post('contacts/store','store');
    
    
        Route::delete('contacts/{id}','delete');
    
    
    });
    Route::controller(NewsLetterController::class)->group(function(){
    
        Route::get('letters','index');
    
        Route::post('letters/store','store');
    
    
        Route::delete('letters/{id}','delete');
    
    
    });
    Route::controller(CategoryController::class)->group(function(){
    
        Route::get('categories','index');
    
        Route::get('categories/{id}','edit');
    
        Route::put('categories/{id}','update');
    
    
        Route::post('categories/store','store');
    
    
        Route::delete('categories/{id}','delete');
    
    
    });
    Route::controller(OrderController::class)->group(function(){
    
        Route::get('orders','index');
    
        Route::get('orders/customers','customers');
        Route::get('orders/products','products');
        Route::get('orders/sales','ordersSales');
        Route::get('orders/status','Payments');
    
        Route::get('orders/{id}','show');
        
        Route::get('orders/search','search');
    
    
        Route::put('orders/{id}','update');
    
    
        Route::post('orders/store','store');
    
    
        Route::delete('orders/{id}','delete');
    
    
    });
    



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
