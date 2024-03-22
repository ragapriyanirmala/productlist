@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Display Product Data') }}</div>

                <div class="card-body">
                <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">SKU</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_sku }}</td>
            <td>{{ $product->product_description }}</td>
            <td>{{ $product->product_price }}</td>
            <td>
            @if ($product->product_image)
                @foreach (json_decode($product->product_image) as $image)
                    <img src="{{ asset('images/' . $image) }}" alt="{{ $product->product_name }}" width="100">
                @endforeach
            @else
                No Image
            @endif
        </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('products.export') }}" class="btn btn-success">Export Products</a>
<form action="{{ route('import.products') }}" method="POST" enctype="multipart/form-data">
    @csrf
<input type="file" name="file" accept=".xlsx, .xls, .csv">
    <button type="submit" class="btn btn-success">Import Products</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
