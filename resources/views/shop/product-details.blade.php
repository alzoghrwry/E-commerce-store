@extends('layouts.app')

@section('title', $product->name . ' | RedStore')

@section('content')
<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
          
            @if($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" width="100%" id="ProductImg">
            @else
                <img src="{{ asset('images/gallery-1.jpg') }}" width="100%" id="ProductImg">
            @endif

            <div class="small-img-row">
               
                @for ($i = 1; $i <= 4; $i++)
                <div class="small-img-col">
                    <img src="{{ asset("images/gallery-$i.jpg") }}" width="100%" class="small-img">
                </div>
                @endfor
            </div>
        </div>
        <div class="col-2">
            <p>Home / {{ $product->name }}</p>
            <h1>{{ $product->name }}</h1>
            <h4>${{ number_format($product->price, 2) }}</h4>

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
            <p>{{ $product->description }}</p>
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
        {{-- هنا يمكن عمل loop لعرض منتجات مشابهة --}}
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
