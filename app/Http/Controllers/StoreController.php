<?php

namespace App\Http\Controllers;

class StoreController extends Controller
{
    public function products() {
        $products = [
            ['name' => 'Nike Shoes', 'price' => 120, 'on_sale' => true, 'description' => 'Comfortable running shoes'],
            ['name' => 'Adidas Jacket', 'price' => 80, 'on_sale' => false, 'description' => 'Winter warm jacket'],
        ];
        return view('shop.products', compact('products'));
    }

    public function productDetails($id = 0) {
        $product = ['name' => 'Nike Shoes', 'price' => 120, 'on_sale' => true, 'description' => 'Comfortable running shoes'];
        return view('shop.product-details', compact('product'));
    }

    public function aboutUs() {
        $title = "About RedStore";
        $description = "We make sports accessible for everyone.";
        $rawHtml = "<strong>Trusted by 1M+ users worldwide</strong>";
        return view('shop.about-us', compact('title', 'description', 'rawHtml'));
    }

    public function account() {
        return view('shop.account');
    }

    public function cart() {
        return view('shop.cart');
    }
}
