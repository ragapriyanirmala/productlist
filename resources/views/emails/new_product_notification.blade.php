<!DOCTYPE html>
<html>
<head>
    <title>New Product Added</title>
</head>
<body>
    <h1>New Product Added</h1>
    <p>A new product has been added:</p>
    
    <ul>
        <li><strong>Name:</strong> {{ $product->product_name }}</li>
        <li><strong>SKU:</strong> {{ $product->product_sku }}</li>
        <li><strong>Description:</strong> {{ $product->product_description }}</li>
        <li><strong>Price:</strong> {{ $product->product_price }}</li>
    </ul>

    <p>Images:</p>
    <ul>
    @foreach(json_decode($product->product_image) as $image)
    <li><img src="{{ asset('images/' . $image) }}" alt="{{ $image }}"></li>
@endforeach

    </ul>
    
    <p>Thank you!</p>
</body>
</html>
