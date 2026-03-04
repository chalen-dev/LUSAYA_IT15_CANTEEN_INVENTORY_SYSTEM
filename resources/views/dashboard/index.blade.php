@extends('app')

@section('title', 'EZ Canteen - Dashboard')

@section('section-header')
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard</h1>
@endsection

@section('content')
    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
        <div class="bg-white rounded border border-gray-200 p-4 shadow-sm">
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Products</h3>
            <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $totalProducts }}</p>
        </div>
        <div class="bg-white rounded border border-gray-200 p-4 shadow-sm">
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Suppliers</h3>
            <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $totalSuppliers }}</p>
        </div>
        <div class="bg-white rounded border border-gray-200 p-4 shadow-sm">
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Stock Entries</h3>
            <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $totalStockEntries }}</p>
        </div>
        <div class="bg-white rounded border border-gray-200 p-4 shadow-sm">
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Stock Value</h3>
            <p class="mt-2 text-3xl font-semibold text-gray-900">${{ number_format($totalStockValue, 2) }}</p>
        </div>
        <div class="bg-white rounded border border-gray-200 p-4 shadow-sm">
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Qty Received</h3>
            <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $totalQuantityReceived }}</p>
        </div>
    </div>

    <!-- Low Stock Alert -->
    @if($totalProducts > 0)
        @if($lowStockProducts->isNotEmpty())
            <div class="mb-8">
                <h2 class="text-lg font-medium text-gray-800 mb-3">Low Stock Products (below 10)</h2>
                <div class="bg-white rounded border border-gray-200 overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Code</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Current Stock</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($lowStockProducts as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->product_code }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->product_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm {{ $product->current_stock < 5 ? 'text-red-600 font-medium' : 'text-orange-600' }}">
                                    {{ $product->current_stock }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ number_format($product->price, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="mb-8 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded">
                All products have sufficient stock (≥10).
            </div>
        @endif
    @else
        <div class="mb-8 bg-gray-50 border border-gray-200 text-gray-700 px-4 py-3 rounded">
            No products available.
        </div>
    @endif

    <!-- Recent Stock Entries -->
    <div>
        <h2 class="text-lg font-medium text-gray-800 mb-3">Recent Stock Entries</h2>
        @if($recentStockEntries->isNotEmpty())
            <div class="bg-white rounded border border-gray-200 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Supplier</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delivery Ref</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($recentStockEntries as $entry)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entry->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entry->product->product_name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entry->supplier->supplier_name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entry->quantity }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entry->delivery_reference }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600">No stock entries yet.</p>
        @endif
    </div>
@endsection
