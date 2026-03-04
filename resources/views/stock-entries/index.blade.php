@extends('app')

@section('title', 'Stock Entries')

@section('content')
    <form method="POST" action="{{ route('stock-entries.destroyMultiple') }}">
        @csrf
        @method('DELETE')

        <h1>Stock Entries List</h1>

        <div class="mb-4 flex gap-3">
            <a href="{{ route('stock-entries.create') }}" class="createBtn">Create New Stock Entry</a>
            <button type="button"
                    id="delete-selected"
                    onclick="confirmDelete(this, 'stock entry')"
                    class="deleteBtn disabled"
                    disabled>
                Delete Selected
            </button>
        </div>

        @if($stockEntries->isNotEmpty())
            <table>
                <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="select-all">
                    </th>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Supplier</th>
                    <th>Quantity</th>
                    <th>Delivery Reference</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stockEntries as $entry)
                    <tr>
                        <td>
                            <input type="checkbox" name="ids[]" value="{{ $entry->id }}" class="row-checkbox">
                        </td>
                        <td>{{ $entry->id }}</td>
                        <td>{{ $entry->product->product_name ?? 'N/A' }}</td>
                        <td>{{ $entry->supplier->supplier_name ?? 'N/A' }}</td>
                        <td>{{ $entry->quantity }}</td>
                        <td>{{ $entry->delivery_reference }}</td>
                        <td>{{ $entry->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('stock-entries.edit', $entry) }}" class="editBtn">View/Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                No stock entries found.
            </div>
        @endif
    </form>
@endsection

@push('scripts')
    <x-script.index-scripts/>
@endpush
