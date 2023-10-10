<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\VideoController;
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

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('products', ProductController::class);
    Route::get('videos', [VideoController::class, 'videos'])->name('videos');
});

Route::group(['prefix' => 'webhooks', 'as' => 'webhook.paymongo.'], function() {
    Route::post('/source-chargeable', [PaymongoController::class, 'chargeable'])
        ->middleware('paymongo.signature:source_chargeable')
        ->name('source-chargeable');

    Route::post('/payment-paid', [PaymongoController::class, 'paymentPaid'])
        ->middleware('paymongo.signature:payment_paid')
        ->name('payment-paid');

    Route::post('/payment-failed', [PaymongoController::class, 'paymentFailed'])
        ->middleware('paymongo.signature:payment_failed')
        ->name('payment-failed');
});
