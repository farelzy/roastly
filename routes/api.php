<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::post('/orders', [OrderController::class, 'store']);

Route::get('/orders/test', function () {
    return response()->json(['message' => 'API works']);
});
