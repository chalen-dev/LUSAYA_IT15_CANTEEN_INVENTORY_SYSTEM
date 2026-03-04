<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_code'  => 'required|max:255|unique:products,product_code',
            'product_name' => 'required|max:255',
            'price' => 'required',
            'current_stock' => 'nullable',
        ]);

        Product::create($validated);

        return redirect()
            ->route('products.index')
            ->withInput()
            ->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_code'  => 'required|max:255|unique:products,product_code,' . $product->id,
            'product_name' => 'required|max:255',
            'price'        => 'required',
            'current_stock' => 'nullable'
        ]);

        $product->update($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

    }

    public function destroyMultiple(Request $request)
    {
        $validated = $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'integer|exists:products,id'
        ]);

        // Check if any of the selected products have stock entries
        $productsWithEntries = Product::whereIn('id', $validated['ids'])
            ->has('stockEntries')
            ->count();

        if ($productsWithEntries > 0) {
            return redirect()
                ->back()
                ->with('error', 'Cannot delete product(s) because they have associated stock entries.');
        }

        // Safe to delete
        Product::whereIn('id', $validated['ids'])->delete();

        return redirect()
            ->back()
            ->with('success', 'Selected products deleted successfully.');
    }
}
