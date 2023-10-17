<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\StatisticsController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::resource('restaurants', RestaurantController::class);
        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('orders', OrderController::class);
        Route::post('/dashboard/products/toggle-visibility/{product_id}', [ProductController::class, 'toggleProductVisibility'])->name('products.toggleProductVisibility');
        Route::get('restaurant/{id}/statistics', [StatisticsController::class, 'year'])->name('restaurant.statistics.year');
        Route::get('restaurant/{id}/statistics/months', [StatisticsController::class, 'months'])->name('restaurant.statistics.months');
    });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
