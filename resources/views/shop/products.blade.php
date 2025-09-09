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
                {{-- الصورة: تأكد أن عندك حقل image_path في DB أو ضع صورة افتراضية --}}
                <img src="{{ asset($product->image_path ?? 'images/default.jpg') }}" alt="{{ $product->name }}">
                
                <h4>{{ $product->name }}</h4>
                
                <div class="rating">
                    {{-- تقدر تخزن تقييم المنتج في DB وتعرضه، هنا ثابت مثال --}}
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                
                <p>${{ number_format($product->price, 2) }}</p>
                
                {{-- رابط لصفحة تفاصيل المنتج --}}
                <a href="{{ route('products.show', $product->id) }}" class="btn">View Details</a>
            </div>
        @endforeach
    </div>

    <div class="page-btn">
        {{-- روابط الترقيم --}}
        {{ $products->links() }}
    </div>
</div>
@endsection
