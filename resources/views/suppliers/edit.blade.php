@extends('app')

@section('title', 'Edit Supplier')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Supplier</h1>

        <form method="POST" action="{{ route('suppliers.update', $supplier) }}" class="bg-white rounded border border-gray-200 p-6 shadow-sm">
            @csrf
            @method('PUT')

            <x-input.text
                label="Supplier Code"
                id="supplier_code"
                name="supplier_code"
                value="{{ old('supplier_code', $supplier->supplier_code) }}"
            />

            <x-input.text
                label="Supplier Name"
                id="supplier_name"
                name="supplier_name"
                value="{{ old('supplier_name', $supplier->supplier_name) }}"
            />

            <x-input.text
                label="Contact Email"
                id="contact_email"
                name="contact_email"
                type="email"
                value="{{ old('contact_email', $supplier->contact_email) }}"
            />

            <x-input.text
                label="Contact Number"
                id="contact_number"
                name="contact_number"
                value="{{ old('contact_number', $supplier->contact_number) }}"
            />

            <div class="flex gap-3 mt-6">
                <button type="submit" class="createBtn">Update Supplier</button>
                <a href="{{ route('suppliers.index') }}" class="cancelBtn">Cancel</a>
            </div>
        </form>
    </div>
@endsection
