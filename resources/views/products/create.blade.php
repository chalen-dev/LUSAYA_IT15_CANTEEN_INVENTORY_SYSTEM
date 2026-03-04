@extends('app')

@section('title', 'Create Product')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Create Product</h1>

        <form method="POST" action="{{ route('products.store') }}" class="bg-white rounded border border-gray-200 p-6 shadow-sm">
            @csrf

            <x-input.text
                label="Product Code"
                id="product_code"
                name="product_code"
                value="{{ old('product_code') }}"
            />

            <x-input.text
                label="Product Name"
                id="product_name"
                name="product_name"
                value="{{ old('product_name') }}"
            />

            <x-input.number
                label="Price"
                name="price"
                step="0.01"
                min="0"
                value="{{ old('price') }}"
            />

            <x-input.number
                label="Current Stock"
                name="current_stock"
                step="1"
                min="0"
                value="{{ old('current_stock', 0) }}"
            />

            <div class="flex gap-3 mt-6">
                <button type="submit" class="createBtn">Create Product</button>
                <a href="{{ route('products.index') }}" class="cancelBtn">Cancel</a>
            </div>
        </form>
    </div>
@endsection
