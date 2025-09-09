@extends('layouts.app')

@section('title', 'All Products | RedStore')

@section('content')
<div class="small-container">
    <div class="row row-2">
        <h2>All Products</h2>
        <select>
            <option>Default Sort</option>
            <option>Sort By Price</option>
            <option>Sort By Popularity</option>
            <option>Sort By Rating</option>
            <option>Sort By Sale</option>
        </select>
    </div>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-4">
                
                <img src="{{ asset($product->image_path ?? 'images/default.jpg') }}" alt="{{ $product->name }}">
                
                <h4>{{ $product->name }}</h4>
                
                <div class="rating">
                   
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                
                <p>${{ number_format($product->price, 2) }}</p>
                
               
                <a href="{{ route('products.show', $product->id) }}" class="btn">View Details</a>
            </div>
        @endforeach
    </div>

    <div class="page-btn">
        
        {{ $products->links() }}
    </div>
</div>
@endsection
