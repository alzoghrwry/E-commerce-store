@extends('layouts.app')

@section('title', $product->name . ' | RedStore')

@section('content')
<div class="small-container single-product" style="padding: 50px 0;">
    <div class="row flex-wrap">
        {{-- قسم الصور --}}
        <div class="col-2 product-images" style="flex: 1; min-width: 300px; margin-right: 40px;">
            {{-- الصورة الرئيسية --}}
            <div class="main-img" style="border:1px solid #f0f0f0; padding:10px; text-align:center;">
                @if($product->image_path)
                    <img src="{{ asset('images/gallery-1.jpg')  }}" width="100%" id="ProductImg" style="max-height:500px; object-fit:contain;">
                @else
                    <img src="{{ asset('images/gallery-1.jpg') }}" width="100%" id="ProductImg" style="max-height:500px; object-fit:contain;">
                @endif
            </div>

            {{-- معرض الصور المصغرة --}}
            <div class="small-img-row" style="display:flex; gap:10px; margin-top:15px;">
                @for ($i = 1; $i <= 4; $i++)
                    <div class="small-img-col" style="flex:1; cursor:pointer; border:1px solid #ddd; padding:5px; text-align:center;">
                        <img src="{{ asset("images/gallery-$i.jpg") }}" width="100%" class="small-img" style="object-fit:cover; max-height:100px;">
                    </div>
                @endfor
            </div>
        </div>

        {{-- قسم المعلومات --}}
        <div class="col-2 product-info" style="flex:1; min-width:300px;">
            <p style="color:#888; margin-bottom:5px;">Home / <span style="color:#ff523b;">{{ $product->name }}</span></p>
            <h1 style="margin:10px 0; font-size:32px; font-weight:700;">{{ $product->name }}</h1>
            <h4 style="color:#ff523b; font-size:24px; margin:10px 0;">${{ number_format($product->price, 2) }}</h4>

            {{-- اختيار الحجم --}}
            <div style="margin:20px 0; display:flex; align-items:center; gap:15px;">
                <select style="padding:10px; border:1px solid #ccc; border-radius:5px;">
                    <option>Select Size</option>
                    <option>XXL</option>
                    <option>XL</option>
                    <option>L</option>
                    <option>M</option>
                    <option>S</option>
                </select>

                {{-- كمية المنتج --}}
                <input type="number" value="1" min="1" style="width:60px; padding:10px; border:1px solid #ccc; border-radius:5px; text-align:center;">
            </div>

            {{-- زر إضافة للسلة --}}
            <a href="{{ url('/cart') }}" class="btn" style="display:inline-block; background:#ff523b; color:#fff; padding:12px 25px; border-radius:5px; text-decoration:none; font-weight:600; transition:0.3s;">Add To Cart</a>

            {{-- تفاصيل المنتج --}}
            <div style="margin-top:30px;">
                <h3 style="margin-bottom:10px; font-size:20px; font-weight:600;">Product Details <i class="fa fa-indent"></i></h3>
                <p style="line-height:1.6; color:#555;">{{ $product->description }}</p>
            </div>
        </div>
    </div>
</div>

{{-- سكربت بسيط لتغيير الصورة عند الضغط على المصغرات --}}
<script>
    const ProductImg = document.getElementById('ProductImg');
    const SmallImgs = document.querySelectorAll('.small-img');
    SmallImgs.forEach(img => {
        img.addEventListener('click', () => {
            ProductImg.src = img.src;
        });
    });
</script>

{{-- تحسين تجاوب الصفحة --}}
<style>
@media(max-width: 768px) {
    .row.flex-wrap {
        flex-direction: column;
    }
    .product-images, .product-info {
        margin-right: 0;
        margin-bottom: 30px;
    }
}
</style>
@endsection
