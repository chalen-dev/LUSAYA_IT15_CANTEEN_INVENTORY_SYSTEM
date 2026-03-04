@extends('app')

@section('title', 'Suppliers')

@section('content')

    <form method="POST" action="{{ route('suppliers.destroyMultiple') }}">
        @csrf
        @method('DELETE')

        <h1>Suppliers List</h1>
        <a href="{{ route('suppliers.create') }}" class="createBtn">Create New Supplier</a>
        <button type="button" onclick="confirmDelete(this, 'supplier')" class="deleteBtn">
            Delete Selected
        </button>

        @if($suppliers->isNotEmpty())
            <table>
                <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="select-all">
                    </th>
                    <th>ID</th>
                    <th>Supplier Code</th>
                    <th>Supplier Name</th>
                    <th>Contact Email</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($suppliers as $supplier)
                    <tr>
                        <td>
                            <input type="checkbox" name="ids[]" value="{{ $supplier->id }}">
                        </td>
                        <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->supplier_code }}</td>
                        <td>{{ $supplier->supplier_name }}</td>
                        <td>{{ $supplier->contact_email }}</td>
                        <td>{{ $supplier->contact_number }}</td>
                        <td>
                            <a href="{{ route('suppliers.edit', $supplier) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h1>No suppliers found. (Please run migrate and seed if needed.)</h1>
        @endif
    </form>

@endsection

@push('scripts')
    <script>
        document.getElementById('select-all').onclick = function() {
            var checkboxes = document.getElementsByName('ids[]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
    </script>
@endpush
