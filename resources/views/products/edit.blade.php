@extends('app')

@section('title', 'Edit Product')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Product</h1>

        <form method="POST" action="{{ route('products.update', $product) }}" class="bg-white rounded border border-gray-200 p-6 shadow-sm">
            @csrf
            @method('PUT')

            <x-input.text
                label="Product Code"
                id="product_code"
                name="product_code"
                value="{{ old('product_code', $product->product_code) }}"
            />

            <x-input.text
                label="Product Name"
                id="product_name"
                name="product_name"
                value="{{ old('product_name', $product->product_name) }}"
            />

            <x-input.number
                label="Price"
                name="price"
                step="0.01"
                min="0"
                value="{{ old('price', $product->price) }}"
            />

            <x-input.number
                label="Current Stock"
                name="current_stock"
                step="1"
                min="0"
                value="{{ old('current_stock', $product->current_stock) }}"
            />

            <div class="flex gap-3 mt-6">
                <button type="submit" class="createBtn">Update Product</button>
                <a href="{{ route('products.index') }}" class="cancelBtn">Cancel</a>
            </div>
        </form>
    </div>
@endsection
