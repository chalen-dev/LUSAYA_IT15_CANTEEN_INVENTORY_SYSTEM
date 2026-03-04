<?php

use App\Helpers\ViewManager;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockEntryController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::delete('products/destroy-multiple', [ProductController::class, 'destroyMultiple'])
    ->name('products.destroyMultiple');
Route::resource('products', ProductController::class);

Route::delete('suppliers/destroy-multiple', [SupplierController::class, 'destroyMultiple'])
    ->name('suppliers.destroyMultiple');
Route::resource('suppliers', SupplierController::class);

Route::delete('stock-entries/destroy-multiple', [StockEntryController::class, 'destroyMultiple'])
    ->name('stock-entries.destroyMultiple');
Route::resource('stock-entries', StockEntryController::class);

Route::resource('dashboard', DashboardController::class);

//Custom Commands
Artisan::command('view:create {name}', function ($name) {
    ViewManager::create($name, $this);
});

