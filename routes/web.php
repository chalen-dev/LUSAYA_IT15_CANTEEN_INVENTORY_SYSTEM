<?php

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


