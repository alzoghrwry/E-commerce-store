<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductController extends Controller
{
public function index()
{
    $products = Product::latest()->paginate(12); // 12 منتج في الصفحة
    return view('shop.products', compact('products'));
}

public function show($id)
{
    $product =Product::findOrFail($id);
    return view('shop.product-details', compact('product'));
}



public function create()
{
    return view('shop.create-product');
}

public function store(Request $request)
{
    $data = $request->validate([
        'name'        => ['required','string','min:2','max:255'],
        'description' => ['nullable','string'],
        'price'       => ['required','numeric','min:0'],
        'on_sale'     => ['nullable','boolean'],
        'image'       => ['nullable','image','max:2048'], 
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    Product::create([
        'name'        => $data['name'],
        'description' => $data['description'] ?? null,
        'price'       => $data['price'],
        'on_sale'     => (bool)($data['on_sale'] ?? false),
        'image_path'  => $imagePath,
    ]);

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}

}
