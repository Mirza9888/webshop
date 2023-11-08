<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromoCodeController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//USERS ROUTES/
Route::prefix('users')->name('users.')->group(function () {
    Route::get('', [\App\Http\Controllers\UserController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\UserController::class, 'create'])->name('create');
    Route::post('', [\App\Http\Controllers\UserController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    Route::put('/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
});

Route::prefix('roles')->name('roles.')->group(function () {
    Route::get('', [\App\Http\Controllers\RoleController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\RoleController::class, 'create'])->name('create');
    Route::post('', [\App\Http\Controllers\RoleController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [\App\Http\Controllers\RoleController::class, 'edit'])->name('edit');
    Route::put('/{id}', [\App\Http\Controllers\RoleController::class, 'update'])->name('update');
    Route::delete('/{id}', [\App\Http\Controllers\RoleController::class, 'destroy'])->name('destroy');
});

//PERMISSION ROUTES

Route::prefix('permissions')->name('permissions.')->group(function () {
    Route::get('', [PermissionController::class, 'index'])->name('index');
    Route::get('/create', [PermissionController::class, 'create'])->name('create');
    Route::post('', [PermissionController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PermissionController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PermissionController::class, 'update'])->name('update');
    Route::delete('/{id}', [PermissionController::class, 'destroy'])->name('destroy');
});

//PRODUCT ROUTES//
Route::prefix('products')->name('products.')->group(function (){

    Route::get('',[ProductController::class,'index'])->name('index');
    Route::get('/create',[ProductController::class,'create'])->name('create');
    Route::post('',[ProductController::class,'store'])->name('store');
    Route::get('{id}',[ProductController::class,'show'])->name('show');
    Route::get('/{id}/edit',[ProductController::class,'edit'])->name('edit');
    Route::put('/{id}',[ProductController::class,'update'])->name('update');
    Route::delete('/{id}',[ProductController::class,'destroy'])->name('destroy');


});

//CATEGORY ROUTES//
Route::prefix('categories')->name('categories.')->group(function (){

    Route::get('',[CategoryController::class,'index'])->name('index');
    Route::get('/create',[CategoryController::class,'create'])->name('create');
    Route::post('',[CategoryController::class,'store'])->name('store');
    Route::get('/{id}',[CategoryController::class,'show'])->name('show');
    Route::get('/{id}/edit',[CategoryController::class,'edit'])->name('edit');
    Route::put('/{id}',[CategoryController::class,'update'])->name('update');
    Route::delete('/{id}',[CategoryController::class,'destroy'])->name('destroy');

});



