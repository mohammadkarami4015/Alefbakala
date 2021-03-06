<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();


Route::get('/send-number', [LoginController::class, 'sendNumber'])->name('sendNumber');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('loginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::middleware('auth:web')->group(function () {

    Route::get('/contactus', [UserController::class, 'contactus'])->name('contactus');

    Route::get('/', [UserController::class, 'init'])->name('home');

    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

    Route::prefix('/shops')->group(function () {

        Route::get('/search', [ShopController::class, 'search'])->name('shop.search');

        Route::get('/', [ShopController::class, 'showAll'])->name('shop.all');

        Route::get('/filter', [ShopController::class, 'filter'])->name('shop.filter');

        Route::get('/products/filter', [ProductsController::class, 'filterByCategory']);

        Route::get('/filter-group', [ShopController::class, 'filterByGroup'])->name('shop.filterByGroup');

        Route::prefix('/{shop}')->group(function () {

            Route::get('/', [ShopController::class, 'details'])->name('shop.details');

            Route::prefix('/products')->group(function () {

                Route::get('/', [ProductsController::class, 'index'])->name('product.index');

                Route::get('/{product:id}', [ProductsController::class, 'detail'])->name('product.details');
            });
        });
    });

    Route::prefix('/cart')->group(function () {

        Route::get('/', [CartController::class, 'show'])->name('cart.show');

        Route::post('/add', [CartController::class, 'add'])->name('cart.add');

        Route::get('/delete', [CartController::class, 'delete'])->name('cart.delete');

        Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

        Route::post('/order', [CartController::class, 'order'])->name('cart.order');

    });

});


