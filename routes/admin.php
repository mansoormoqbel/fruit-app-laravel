<?php
use Illuminate\Http\Request;
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
Route::middleware(['guest:admin'])->group(function () {
    Route::get('/',[App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin.login');
    Route::get('/save',[App\Http\Controllers\Admin\AdminController::class,'save'])->name('admin.save');
    Route::post('/login',[App\Http\Controllers\Admin\AdminController::class,'login'])->name('admin.getlogin');
});

Route::middleware(['auth:admin'])->group(function () {
 
   
    Route::get('/dashboard',  [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix' => 'User'], function () {
        Route::get('/',[App\Http\Controllers\Admin\UserController::class,'index'])->name('admin.user');
        Route::post('/create',[App\Http\Controllers\Admin\UserController::class,'store'])->name('admin.user.create');
        Route::get('/edit/{id}',[App\Http\Controllers\Admin\UserController::class,'edit'])->name('admin.user.edit');
        Route::post('/update',[App\Http\Controllers\Admin\UserController::class,'update'])->name('admin.user.update');
        Route::delete('delete/{id}',[App\Http\Controllers\Admin\UserController::class,'Delete'])->name('admin.user.delete');
        Route::get('changeStatus/{id}',[App\Http\Controllers\Admin\UserController::class, 'changeStatus']) -> name('admin.vendors.status');
        Route::get('/view/{id}',[App\Http\Controllers\Admin\UserController::class,'view'])->name('admin.user.view');

    });
    Route::group(['prefix' => 'Category'], function () {
        Route::get('/',[App\Http\Controllers\Admin\CategoryController::class,'index'])->name('admin.category');
        Route::post('/create',[App\Http\Controllers\Admin\CategoryController::class,'store'])->name('admin.category.create');
        Route::get('/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('admin.category.edit');
        Route::post('/update',[App\Http\Controllers\Admin\CategoryController::class,'update'])->name('admin.category.update');
        Route::delete('delete/{id}',[App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('admin.category.delete');
        Route::get('/view/{id}',[App\Http\Controllers\Admin\CategoryController::class,'show'])->name('admin.category.view'); 
    });
    Route::group(['prefix' => 'Prodcut'], function () {
        Route::get('/',[App\Http\Controllers\Admin\ProductController::class,'index'])->name('admin.prodcut');
        Route::get('/create',[App\Http\Controllers\Admin\ProductController::class,'create'])->name('admin.prodcut.create');
        Route::post('/store',[App\Http\Controllers\Admin\ProductController::class,'store'])->name('admin.prodcut.store');
        Route::get('/edit/{id}',[App\Http\Controllers\Admin\ProductController::class,'edit'])->name('admin.prodcut.edit');
        Route::post('/update',[App\Http\Controllers\Admin\ProductController::class,'update'])->name('admin.prodcut.update');
        Route::get('delete/{id}',[App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('admin.prodcut.delete');
       
       

    });
    Route::group(['prefix' => 'Cart'], function () {
        Route::get('/',[App\Http\Controllers\Admin\CartController::class,'index'])->name('admin.cart');
       /*  Route::get('/create',[App\Http\Controllers\Admin\ProductController::class,'create'])->name('admin.prodcut.create');
        Route::post('/store',[App\Http\Controllers\Admin\ProductController::class,'store'])->name('admin.prodcut.store');
        Route::get('/edit/{id}',[App\Http\Controllers\Admin\ProductController::class,'edit'])->name('admin.prodcut.edit');
        Route::post('/update',[App\Http\Controllers\Admin\ProductController::class,'update'])->name('admin.prodcut.update');
        Route::get('delete/{id}',[App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('admin.prodcut.delete'); */
       
       

    });
    Route::group(['prefix' => 'CartItem'], function () {
        
        Route::get('/',[App\Http\Controllers\Admin\CartItemController::class,'index'])->name('admin.cartitem');
       /*  Route::get('/create',[App\Http\Controllers\Admin\ProductController::class,'create'])->name('admin.prodcut.create');
        Route::post('/store',[App\Http\Controllers\Admin\ProductController::class,'store'])->name('admin.prodcut.store');
        Route::get('/edit/{id}',[App\Http\Controllers\Admin\ProductController::class,'edit'])->name('admin.prodcut.edit');
        Route::post('/update',[App\Http\Controllers\Admin\ProductController::class,'update'])->name('admin.prodcut.update');
        Route::get('delete/{id}',[App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('admin.prodcut.delete'); */
       
       

    });
});