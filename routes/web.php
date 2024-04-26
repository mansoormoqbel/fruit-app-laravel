<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
    Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about')->middleware('auth');
    Route::post('/addItems', [App\Http\Controllers\HomeController::class, 'addItem'])->name('addItems')->middleware('auth');
    Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop')->middleware('auth');
    Route::get('/error', [App\Http\Controllers\ShopController::class, 'ErrorPage'])->name('ErrorPage')->middleware('auth');
    Route::post('/addItem', [App\Http\Controllers\ShopController::class, 'addItem'])->name('addItem')->middleware('auth');
    Route::get('/Cart', [App\Http\Controllers\CartController::class, 'index'])->name('Cart')->middleware('auth');
    Route::get('delete/{id}',[App\Http\Controllers\CartController::class,'DeleteCartItem'])->name('CartItem.delete')->middleware('auth');
    Route::get('/Checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('Checkout')->middleware('auth');
    Route::post('/OrderPlace', [App\Http\Controllers\CheckoutController::class, 'create'])->name('OrderPlace')->middleware('auth');
    Route::get('/test', [App\Http\Controllers\CheckoutController::class, 'placeOrder'])->name('test')->middleware('auth');

    