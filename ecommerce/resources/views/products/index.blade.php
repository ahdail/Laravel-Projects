@extends('app')

@section('content')
    <div class="container">
        <h1>Products</h1>

        @if (session('product_exist'))
            <div class="alert alert-danger">
                {{ session('product_exist') }}
            </div>
        @endif
        @if (session('product_destroy'))
            <div class="alert alert-success">
                {{ session('product_destroy') }}
            </div>
        @endif
        @if (session('product_edit'))
            <div class="alert alert-success">
                {{ session('product_edit') }}
            </div>
        @endif
        @if (session('product_update'))
            <div class="alert alert-success">
                {{ session('product_update') }}
            </div>
        @endif
        @if (session('product_store'))
            <div class="alert alert-success">
                {{ session('product_store') }}
            </div>
        @endif

        <a href="{{ route('products.create') }}" class="btn btn-success">New Product</a>
        <br />  <br />
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Featured</th>
                <th>Recommend</th>
                <th>Category</th>
                <th>Action</th>
            </tr>

            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ str_limit($product->name, $limit = 30, $end = '...') }}</td>
                    <td>{{ str_limit($product->description, $limit = 40, $end = '...') }}</td>
                    <td>{{ number_format($product->price, 2,',','.') }}</td>
                    <td>{{ $product->featured == 1 ? 'Yes' : 'No' }}</td>
                    <td>{{ $product->recommend == 1 ? 'Yes' : 'No' }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-warning btn-sm">Edit</a>

                        <a href="{{ route('products.destroy', ['id' => $product->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $products->render() !!}

    </div>
@endsection