<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
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

Route::get('/login', function () {
    return redirect()->route('login');
});
Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');



//USERS ROUTES/
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/myaccount', [UserController::class, 'myaccount'])->name('myaccount');
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
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/landing', [ProductController::class, 'landing'])->name('landing');
    Route::get('', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('', [ProductController::class, 'store'])->name('store');
    Route::get('{id}', [ProductController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
    Route::get('/category/{category_id}', [ProductController::class, 'category'])->name('category');

});
//CATEGORY ROUTES//
Route::prefix('categories')->name('categories.')->group(function () {


    Route::get('', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');

    Route::post('', [CategoryController::class, 'store'])->name('store');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');



    Route::get('/{categoryId}/subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');
    Route::get('/{categoryId}/subcategories/create', [SubcategoryController::class, 'create'])->name('subcategories.create');
    Route::post('/{categoryId}/subcategories', [SubcategoryController::class, 'store'])->name('subcategories.store');
    Route::get('/{categoryId}/subcategories/{id}', [SubcategoryController::class, 'show'])->name('subcategories.show');
    Route::get('/{categoryId}/subcategories/{id}/edit', [SubcategoryController::class, 'edit'])->name('subcategories.edit');
    Route::put('/{categoryId}/subcategories/{id}', [SubcategoryController::class, 'update'])->name('subcategories.update');
    Route::delete('/{categoryId}/subcategories/{id}', [SubcategoryController::class, 'destroy'])->name('subcategories.destroy');
});
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('', [CartController::class, 'index'])->name('index');
    Route::get('/add/{product}', [CartController::class, 'add'])->name('add');
    Route::post('/{productId}', [CartController::class, 'update'])->name('update');
    Route::delete('/{productId}', [CartController::class, 'remove'])->name('remove');
    Route::post('/apply', [CartController::class, 'applyDiscount'])->name('apply');
    Route::post('/apply-promocode', [CartController::class, 'applyPromoCode'])->name('apply-promocode');
});
Route::prefix('orders')->name('orders.')->group(function () {
    Route::get('', [OrderController::class, 'index'])->name('index');
    Route::post('/create', [OrderController::class, 'create'])->name('create');
    Route::post('', [OrderController::class, 'store'])->name('store');
    Route::get('/{id}', [OrderController::class, 'show'])->name('show');
    Route::get('/{id}/edit',[OrderController::class,'edit'])->name('edit');
    Route::put('/{id}',[OrderController::class,'update'])->name('update');
    Route::delete('/{id}',[OrderController::class,'destroy'])->name('destroy');
});


