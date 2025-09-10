<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('shop.products', compact('products'));
    }

   
    public function show($id)
    {
        $product = Product::with(['category', 'reviews.user'])->findOrFail($id);
        return view('shop.product-details', compact('product'));
    }

  
    public function create()
    {
        $categories = Category::all(); 
        return view('shop.create-product', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|min:2|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'on_sale'     => 'nullable|boolean',
            'image'       => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name'        => $data['name'],
            'description' => $data['description'] ?? null,
            'price'       => $data['price'],
            'category_id' => $data['category_id'] ?? null,
            'on_sale'     => (bool)($data['on_sale'] ?? false),
            'image_path'  => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    public function edit(Product $product)
    {
        $categories = Category::all(); 
        return view('shop.create-product', compact('product', 'categories'));
    }

   
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'        => 'required|string|min:2|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'on_sale'     => 'nullable|boolean',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $newPath = $request->file('image')->store('products', 'public');
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $product->image_path = $newPath;
        }

        $product->update([
            'name'        => $data['name'],
            'description' => $data['description'] ?? null,
            'price'       => $data['price'],
            'category_id' => $data['category_id'] ?? null,
            'on_sale'     => (bool)($data['on_sale'] ?? false),
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // حذف منتج
    public function destroy(Product $product)
    {
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
