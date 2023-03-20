<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartConroller;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\orderdate;
use App\Http\Controllers\POSController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('Auth.login');
});


//for admin

Route::middleware(['auth','verified','authadmin'])->group(function(){
    Route::resource('categories', CategoriesController::class);
    Route::resource('items', ItemsController::class);
    
    
    Route::get('index',[orderdate::class,'index']);
    Route::get('gettodayorder',[orderdate::class,'get_today_order']);
    });
    
    
    
    //for user
    Route::middleware(['auth','verified','authuser'])->group(function(){
    
    Route::resource('pos', POSController::class);
    // Route::resource('carts', CartConroller::class);
    
    Route::post('addCart', [CartConroller::class,'store']);
    Route::post('updateCart/{rowId}',[CartConroller::class,'update']);
    Route::get('cart-remove/{rowId}',[CartConroller::class,'remove']);
    
    Route::post('add-invoice',[CartConroller::class,'addinvoice']);
    Route::post('final-invoice',[CartConroller::class,'finalinvoice']);
    });
    















// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
