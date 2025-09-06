<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    
    private array $products = [
        [
            'id' => 1,
            'name' => 'Wireless Headphones',
            'price' => 59.99,
            'on_sale' => true,
            'description' => 'Comfortable, long battery life, Bluetooth 5.2',
            'image' => 'images/products/headphones.jpg',
        ],
        [
            'id' => 2,
            'name' => 'Smart Watch',
            'price' => 129.00,
            'on_sale' => false,
            'description' => 'Heart rate monitor, GPS, water resistant',
            'image' => 'images/products/smartwatch.jpg',
        ],
        [
            'id' => 3,
            'name' => 'Gaming Mouse',
            'price' => 39.50,
            'on_sale' => false,
            'description' => 'Ergonomic design, RGB, high DPI',
            'image' => 'images/products/mouse.jpg',
        ],
    ];

    public function index()
    {
        // return view('shop.index');
    }

    public function products()
    {
        $products = $this->products;
        return view('shop.products', compact('products'));
    }

    public function productDetails($id = 1)
    {
        
        $product = collect($this->products)->firstWhere('id', (int)$id) ?? $this->products[0];
        return view('shop.product-details', compact('product'));
    }

    public function cart()
    {
        return view('shop.cart');
    }

    public function about()
    {
        $title = 'About Our Store';
        $description = 'We are a small team passionate about great products and great service.';
        $rawHtml = '<p><strong>Our Mission:</strong> Deliver value with every order.</p>'; 

        return view('shop.about-us', compact('title', 'description', 'rawHtml'));
    }

    public function contact()
    {
        return view('shop.contact');
    }
}
