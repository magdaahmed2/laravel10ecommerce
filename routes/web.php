<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
/*
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AppController::class,'home'])->name('app.index');;
Route::get('/shop', [ShopController::class,'index'])->name('shop.index');;
Route::get('/product/{slug}',[ShopController::class,'productDetails'])->name('shop.product.details');
Route::get('/cart',[CartController::class,'index'])->name('cart.index');

Route::middleware('auth')->group(function(){
    Route::get('/my-account', [UserController::class,'index'])->name('user.index');

}
);
Route::middleware('auth','auth.admin')->group(function(){
    Route::get('/admin', [AdminController::class,'index'])->name('admin.index');

}
);