<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VideoController;
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

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('form/{product?}', [ProductController::class, 'form'])->name('form');
    });

    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
        Route::get('/', [CartController::class, 'create'])->name('create');
        Route::post('/', [CartController::class, 'store'])->name('store');
        Route::get('payment/{order?}/success', [PaymentController::class, 'success'])->name('payment.success');
        Route::get('payment/failed', [PaymentController::class, 'failed'])->name('payment.failed');
    });

    Route::get('videos', [VideoController::class, 'videos'])->name('videos');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('login.post');

Route::get('/', function () {
    return redirect()->route('login');
});
