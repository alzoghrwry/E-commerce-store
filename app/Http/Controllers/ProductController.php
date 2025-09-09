<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

}
