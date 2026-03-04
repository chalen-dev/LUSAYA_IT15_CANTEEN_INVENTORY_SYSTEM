@extends('app')

@section('title', 'Edit Stock Entry')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Stock Entry</h1>

        <form method="POST" action="{{ route('stock-entries.update', $stockEntry) }}" class="bg-white rounded border border-gray-200 p-6 shadow-sm">
            @csrf
            @method('PUT')

            {{-- Product dropdown --}}
            <x-input.select
                id="product_id"
                name="product_id"
                label="Product"
                :value="old('product_id', $stockEntry->product_id)"
                :options="$productOptions"
            />

            {{-- Supplier dropdown --}}
            <x-input.select
                id="supplier_id"
                name="supplier_id"
                label="Supplier"
                :value="old('supplier_id', $stockEntry->supplier_id)"
                :options="$supplierOptions"
            />

            {{-- Quantity --}}
            <x-input.number
                label="Quantity"
                name="quantity"
                step="1"
                min="1"
                :value="old('quantity', $stockEntry->quantity)"
            />

            {{-- Delivery Reference --}}
            <x-input.text
                label="Delivery Reference"
                name="delivery_reference"
                :value="old('delivery_reference', $stockEntry->delivery_reference)"
            />

            <div class="flex gap-3 mt-6">
                <button type="submit" class="createBtn">Update Stock Entry</button>
                <a href="{{ route('stock-entries.index') }}" class="cancelBtn">Cancel</a>
            </div>
        </form>
    </div>
@endsection
