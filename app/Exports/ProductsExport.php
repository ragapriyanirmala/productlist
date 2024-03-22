<?php
namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithMapping, WithHeadings
{
    public function collection()
    {
        return Product::all();
    }

    public function map($product): array
    {
        $imagePath = asset('images/' . $product->product_image); // Assuming images are stored in public/images folder

        return [
            $product->id,
            $product->product_name,
            $product->product_sku,
            $product->product_description,
            $product->product_price,
            $imagePath,
            // Add more columns as needed
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Product Name',
            'Product SKU',
            'Product Description',
            'Product Price',
            'Product Image',
            // Add more headings as needed
        ];
    }
}
