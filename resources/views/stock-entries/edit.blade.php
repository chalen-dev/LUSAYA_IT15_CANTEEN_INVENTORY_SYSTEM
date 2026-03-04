@extends('app')

@section('title', 'Edit Stock Entry')

@section('content')
    <form method="POST" action="{{ route('stock-entries.update', $stockEntry) }}">
        @csrf
        @method('PUT')

        {{-- Product dropdown using select component --}}
        <x-input.select
            id="product_id"
            name="product_id"
            label="Product"
            :value="old('product_id', $stockEntry->product_id)"
            :options="$productOptions"
        />

        {{-- Supplier dropdown using select component --}}
        <x-input.select
            id="supplier_id"
            name="supplier_id"
            label="Supplier"
            :value="old('supplier_id', $stockEntry->supplier_id)"
            :options="$supplierOptions"
        />

        {{-- Quantity using number component --}}
        <x-input.number
            label="Quantity"
            name="quantity"
            step="1"
            min="1"
            :value="old('quantity', $stockEntry->quantity)"
        />

        {{-- Delivery Reference using text component --}}
        <x-input.text
            label="Delivery Reference"
            name="delivery_reference"
            :value="old('delivery_reference', $stockEntry->delivery_reference)"
        />

        <button type="submit" class="createBtn">Update Stock Entry</button>
        <a href="{{ route('stock-entries.index') }}" class="cancelBtn">Cancel</a>
    </form>
@endsection
