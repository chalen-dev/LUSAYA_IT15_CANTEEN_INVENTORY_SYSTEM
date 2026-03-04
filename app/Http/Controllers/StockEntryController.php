<?php

namespace App\Http\Controllers;

use App\Models\StockEntry;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockEntryController extends Controller
{
    /**
     * Display a listing of stock entries.
     */
    public function index()
    {
        $stockEntries = StockEntry::with('product', 'supplier')->get();
        return view('stock-entries.index', compact('stockEntries'));
    }

    /**
     * Show the form for creating a new stock entry.
     */
    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();

        // Prepare options arrays for the dropdowns
        $productOptions = $products->pluck('product_name', 'id')->toArray();

        $supplierOptions = $suppliers->mapWithKeys(function ($supplier) {
            // Use supplier_name if exists, otherwise name, fallback to id
            $displayName = $supplier->supplier_name ?? $supplier->name ?? 'Supplier #' . $supplier->id;
            return [$supplier->id => $displayName];
        })->toArray();

        return view('stock-entries.create', compact('productOptions', 'supplierOptions'));
    }

    /**
     * Store a newly created stock entry.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id'         => 'required|exists:products,id',
            'supplier_id'        => 'required|exists:suppliers,id',
            'quantity'           => 'required|integer|min:1',
            'delivery_reference' => 'required|string|max:255|unique:stock_entries,delivery_reference',
        ]);

        // Create stock entry
        $stockEntry = StockEntry::create($validated);

        // Increase product stock
        $product = Product::find($validated['product_id']);
        $product->current_stock += $validated['quantity'];
        $product->save();

        return redirect()
            ->route('stock-entries.index')
            ->with('success', 'Stock entry created successfully.');
    }

    /**
     * Display the specified stock entry.
     */
    public function show(StockEntry $stockEntry)
    {

    }

    /**
     * Show the form for editing the specified stock entry.
     */
    public function edit(StockEntry $stockEntry)
    {
        $products = Product::all();
        $suppliers = Supplier::all();

        $productOptions = $products->pluck('product_name', 'id')->toArray();
        $supplierOptions = $suppliers->mapWithKeys(function ($supplier) {
            $displayName = $supplier->supplier_name ?? $supplier->name ?? 'Supplier #' . $supplier->id;
            return [$supplier->id => $displayName];
        })->toArray();

        return view('stock-entries.edit', compact('stockEntry', 'productOptions', 'supplierOptions'));
    }

    /**
     * Update the specified stock entry.
     */
    public function update(Request $request, StockEntry $stockEntry)
    {
        $validated = $request->validate([
            'product_id'         => 'required|exists:products,id',
            'supplier_id'        => 'required|exists:suppliers,id',
            'quantity'           => 'required|integer|min:1',
            'delivery_reference' => 'required|string|max:255|unique:stock_entries,delivery_reference,' . $stockEntry->id,
        ]);

        // Calculate quantity difference
        $oldQuantity = $stockEntry->quantity;
        $newQuantity = $validated['quantity'];
        $quantityDiff = $newQuantity - $oldQuantity;

        // Update stock entry
        $stockEntry->update($validated);

        // Adjust product stock
        if ($quantityDiff != 0) {
            $product = Product::find($validated['product_id']);
            $product->current_stock += $quantityDiff;
            $product->save();
        }

        return redirect()
            ->route('stock-entries.index')
            ->with('success', 'Stock entry updated successfully.');
    }

    /**
     * Remove the specified stock entry (single delete).
     */
    public function destroy(StockEntry $stockEntry)
    {

    }

    /**
     * Remove multiple stock entries.
     */
    public function destroyMultiple(Request $request)
    {
        $validated = $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'integer|exists:stock_entries,id',
        ]);

        $stockEntries = StockEntry::whereIn('id', $validated['ids'])->get();

        foreach ($stockEntries as $entry) {

            $product = Product::find($entry->product_id);
            $product->current_stock -= $entry->quantity;
            $product->save();

            $entry->delete();
        }

        return redirect()
            ->back()
            ->with('success', 'Selected stock entries deleted successfully.');
    }
}
