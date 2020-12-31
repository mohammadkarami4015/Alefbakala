<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'init'])->name('home');

Route::prefix('/shop')->group(function () {
    Route::get('/', [ShopController::class, 'showAll'])->name('shop.all');

    Route::prefix('/{shop}')->group(function () {

        Route::get('/', [ShopController::class, 'details'])->name('shop.details');

        Route::prefix('/products')->group(function () {

            Route::get('/', [ProductsController::class, 'index'])->name('product.index');

            Route::get('/{product}', [ProductsController::class, 'detail'])->name('product.details');
        });
    });
});
