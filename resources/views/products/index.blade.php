@extends('app')

@section('title', 'Products')

@section('content')


    <form method="POST" action="{{ route('products.destroyMultiple')}}">
        @csrf
        @method('DELETE')

        <h1>Products List</h1>
        <a href="{{route('products.create')}}" class="createBtn">Create new Product</a>
        <button type="button" id="delete-selected" onclick="confirmDelete(this, 'product')" class="deleteBtn disabled" disabled>
            Delete Selected
        </button>
        @if($products->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="select-all">
                    </th>
                    <th>ID</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Current Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        <input type="checkbox" name="ids[]" value="{{ $product->id }}">
                    </td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->current_stock }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="editBtn">Edit</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        @else
            <h1>No products present. (Please run migrate seed)</h1>
        @endif

    </form>

@endsection

@push('scripts')
    <x-script.index-scripts/>
@endpush


