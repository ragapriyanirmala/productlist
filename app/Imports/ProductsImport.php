<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        //import
        return new Product([
            'product_name' => $row['product_name'],
            'product_sku' => $row['product_sku'],
            'product_description' => $row['product_description'],
            'product_price' => $row['product_price'],
        ]);
    }
}
