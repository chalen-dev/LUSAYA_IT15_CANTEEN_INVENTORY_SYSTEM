<?php

use App\Helpers\ViewManager;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockEntryController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::resource('products', ProductController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('stock-entries', StockEntryController::class);

//Custom Commands
Artisan::command('view:create {name}', function ($name) {
    ViewManager::create($name, $this);
});

