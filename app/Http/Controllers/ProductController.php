<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
 public function index()
    {
        $products = Product::latest()->paginate(10); 
        return view('shop.products', compact('products'));
    }

    public function show(Product $product)
    {
        // Route Model Binding هنا يضمن أن $product موديل Eloquent
        return view('shop.product-details', compact('product'));
    }

    
    public function create()
    {
        return view('shop.create-product');
    }

    // حفظ منتج جديد
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|min:2|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
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
            'on_sale'     => (bool)($data['on_sale'] ?? false),
            'image_path'  => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    
    
    public function edit(Product $product)
    {
        return view('shop.edit-product', compact('product'));
    }

    // تحديث منتج
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'        => 'required|string|min:2|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
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
