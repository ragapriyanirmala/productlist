@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Form') }}</div>

                <div class="card-body">
                    <form action="{{ url('formstore') }}" method="POST"  enctype="multipart/form-data">
                        @csrf

                        <div class="mb-6">
                            <label class="form-label" for="product_name">Product name:</label>
                            <input 
                                type="text" 
                                name="product_name" 
                                id="product_name"
                                class="form-control @error('product_name') is-invalid @enderror" 
                                placeholder="Product name">

                            @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <label class="form-label" for="product_sku">SKU:</label>
                            <input 
                                type="text" 
                                name="product_sku" 
                                id="product_sku"
                                class="form-control @error('product_sku') is-invalid @enderror" 
                                placeholder="SKU">

                            @error('product_sku')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <label class="form-label" for="product_price">Price:</label>
                            <input 
                                type="text" 
                                name="product_price" 
                                id="product_price"
                                class="form-control @error('product_price') is-invalid @enderror" 
                                placeholder="Price">

                            @error('product_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <label class="form-label" for="product_description">Product Description:</label>
                            <textarea
                                id="product_description"
                                name="product_description"
                                rows="10" cols="100"
                                class="form-control"
                                placeholder="Enter product description here..."
                            ></textarea>
                            @error('product_description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-6">
                    <label class="form-label" for="product_image">Product Images:</label>
                    <input
                        id="product_image"
                        name="product_image[]"
                        type="file"
                        multiple
                        class="form-control-file"
                        accept="image/*"
                    >
                    @error('product_image.*')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                        <div class="mt-6">
                            <button type="submit" class="btn btn-success btn-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
