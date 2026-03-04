@extends('app')

@section('title', 'Create Stock Entry')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Create Stock Entry</h1>

        <form method="POST" action="{{ route('stock-entries.store') }}" class="bg-white rounded border border-gray-200 p-6 shadow-sm">
            @csrf

            <x-input.select
                id="product_id"
                name="product_id"
                label="Product"
                :value="old('product_id')"
                :options="$productOptions"
            />

            <x-input.select
                id="supplier_id"
                name="supplier_id"
                label="Supplier"
                :value="old('supplier_id')"
                :options="$supplierOptions"
            />

            <x-input.number
                label="Quantity"
                name="quantity"
                step="1"
                min="1"
                value="{{ old('quantity') }}"
            />

            <x-input.text
                label="Delivery Reference"
                name="delivery_reference"
                value="{{ old('delivery_reference') }}"
            />

            <div class="flex gap-3 mt-6">
                <button type="submit" class="createBtn">Create Stock Entry</button>
                <a href="{{ route('stock-entries.index') }}" class="cancelBtn">Cancel</a>
            </div>
        </form>
    </div>
@endsection
