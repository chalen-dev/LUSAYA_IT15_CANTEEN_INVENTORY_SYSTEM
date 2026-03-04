<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockEntry;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockEntries = StockEntry::all();
        return view('stock_entries.index', compact('stockEntries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('stock_entries.create', compact('products', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StockEntry $stockEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockEntry $stockEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockEntry $stockEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockEntry $stockEntry)
    {
        //
    }
}
