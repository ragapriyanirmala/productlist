<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Imports\ProductsImport;


use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\NewProductNotification;
use Illuminate\Support\Facades\Mail;




class ProductController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_sku' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric|min:0',
            'product_image.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validate each image
        ]);
    
        // Initialize an empty array to store image names
        $imageNames = [];

    
        if ($request->hasFile('product_image')) {
            foreach ($request->file('product_image') as $image) {
                // Generate a unique name for each image
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
                // Move the uploaded image to the storage location
                $image->move(public_path('images'), $imageName);
                
                // Store the image name in the array
                $imageNames[] = $imageName;
            }
        }

    
        // Create a new product with the image names
        $product = new Product([
            'product_name' => $request->input('product_name'),
            'product_sku' => $request->input('product_sku'),
            'product_description' => $request->input('product_description'),
            'product_price' => $request->input('product_price'),
        ]);

        $product->product_image = json_encode($imageNames); // Convert array to JSON string

    $product->save();

    $userEmail = Auth::user()->email;

    // Send email to admin
    $adminEmail = 'ragapriya.ait@gmail.com'; // Replace with your admin's email address
    Mail::to($adminEmail)->send(new NewProductNotification($product));

    // Send email to logged-in user
    Mail::to($userEmail)->send(new NewProductNotification($product));
        return redirect()->route('displaydata')->with('success', 'Product added successfully');
    }

    public function displaydata()
    {

    $products = Product::all();
    return view('displaydata', compact('products'));

    }
    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        Excel::import(new ProductsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Products imported successfully!');
    }
}
