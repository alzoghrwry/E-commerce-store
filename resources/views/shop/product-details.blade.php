@extends('layouts.app')

@section('title', 'Product Details | RedStore')

@section('content')
<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="{{ asset('images/gallery-1.jpg') }}" width="100%" id="ProductImg">

            <div class="small-img-row">
                @for ($i = 1; $i <= 4; $i++)
                <div class="small-img-col">
                    <img src="{{ asset("images/gallery-$i.jpg") }}" width="100%" class="small-img">
                </div>
                @endfor
            </div>
        </div>
        <div class="col-2">
            <p>Home / T-Shirt</p>
            <h1>Red Printed T-Shirt by HRX</h1>
            <h4>$50.00</h4>
            <select>
                <option>Select Size</option>
                <option>XXL</option>
                <option>XL</option>
                <option>L</option>
                <option>M</option>
                <option>S</option>
            </select>
            <input type="number" value="1">
            <a href="{{ url('/cart') }}" class="btn">Add To Cart</a>

            <h3>Product Details <i class="fa fa-indent"></i></h3>
            <p>Give your summer wardrobe a style upgrade with the HRX Men's Active T-Shirt. Team it with a pair of
                shorts for your morning workout or denims for an evening out with the guys.</p>
        </div>
    </div>
</div>

<div class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
        <p>View More</p>
    </div>
</div>

<div class="small-container">
    <div class="row">
        @for ($i = 9; $i <= 12; $i++)
        <div class="col-4">
            <img src="{{ asset("images/product-$i.jpg") }}">
            <h4>Red Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$50.00</p>
        </div>
        @endfor
    </div>
</div>
@endsection
