<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the suppliers.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new supplier.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created supplier in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_code'  => 'required|string|max:255|unique:suppliers,supplier_code',
            'supplier_name'  => 'required|string|max:255',
            'contact_email'  => 'required|email|max:255|unique:suppliers,contact_email',
            'contact_number' => 'required|string|max:255',
        ]);

        Supplier::create($validated);

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified supplier.
     */
    public function show(Supplier $supplier)
    {

    }

    /**
     * Show the form for editing the specified supplier.
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified supplier in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'supplier_code'  => 'required|string|max:255|unique:suppliers,supplier_code,' . $supplier->id,
            'supplier_name'  => 'required|string|max:255',
            'contact_email'  => 'required|email|max:255|unique:suppliers,contact_email,' . $supplier->id,
            'contact_number' => 'required|string|max:255',
        ]);

        $supplier->update($validated);

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier updated successfully.');
    }

    /**
     * Remove the specified supplier from storage.
     */
    public function destroy(Supplier $supplier)
    {

    }

    /**
     * Remove multiple suppliers from storage.
     */
    public function destroyMultiple(Request $request)
    {
        $validated = $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'integer|exists:suppliers,id',
        ]);

        Supplier::whereIn('id', $validated['ids'])->delete();

        return redirect()
            ->back()
            ->with('success', 'Selected suppliers deleted successfully.');
    }
}
