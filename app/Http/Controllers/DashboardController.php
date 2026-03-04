<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockEntry;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalProducts = Product::count();
        $totalSuppliers = Supplier::count();
        $totalStockEntries = StockEntry::count();

        $totalStockValue = Product::sum(DB::raw('price * current_stock'));

        $lowStockProducts = Product::where('current_stock', '<', 10)->get(); // threshold 10, configurable

        $recentStockEntries = StockEntry::with('product', 'supplier')
            ->latest()
            ->take(5)
            ->get();

        $totalQuantityReceived = StockEntry::sum('quantity');

        return view('dashboard.index', compact(
            'totalProducts',
            'totalSuppliers',
            'totalStockEntries',
            'totalStockValue',
            'lowStockProducts',
            'recentStockEntries',
            'totalQuantityReceived'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
