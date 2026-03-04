@extends('app')

@section('title', 'Edit Product')

@section('content')
    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')

        <x-input.text
            label="Product Code"
            name="product_code"
            value="{{ old('product_code', $product->product_code) }}"
        />

        <x-input.text
            label="Product Name"
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

        <button type="submit" class="createBtn">Update Product</button>
        <a href="{{ route('products.index') }}" class="cancelBtn">Cancel</a>
    </form>
@endsection
