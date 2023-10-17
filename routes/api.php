<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\GuestController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\RestaurantController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('products', [ProductController::class, 'index'])->name('api.products.index');
Route::get('products/{product}', [ProductController::class, 'show'])->name('api.products.show');

Route::get('restaurants', [RestaurantController::class, 'index'])->name('api.restaurants.index');
Route::get('restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('api.restaurants.show');

Route::get('categories', [CategoryController::class, 'index'])->name('api.categories.index');


// Pagamento
Route::get('orders', [OrderController::class, 'index']);

Route::get('orders/generate', [OrderController::class, 'generate']);
Route::post('orders/make/payment', [OrderController::class, 'makePayment']);

// PER LA MAIL DI RIEPILOGO ORDINE
Route::post('guests/', [GuestController::class, 'store'])->name('api.guests.store');
