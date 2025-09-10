@extends('layouts.app')

@section('title', isset($product) ? 'Edit Product | RedStore' : 'Add New Product | RedStore')

@section('content')
<div class="max-w-5xl mx-auto mt-10 p-8 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">
        {{ isset($product) ? 'Edit Product' : 'Add New Product' }}
    </h1>

   
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

   
    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" 
          method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

       
        <div>
            <label for="name" class="block text-gray-700 font-semibold mb-2">Product Name</label>
            <input type="text" name="name" id="name" 
                   value="{{ old('name', $product->name ?? '') }}"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                   placeholder="Enter product name">
        </div>

       
        <div>
            <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                      placeholder="Enter product description">{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

           
            <div>
                <label for="price" class="block text-gray-700 font-semibold mb-2">Price ($)</label>
                <input type="number" step="0.01" name="price" id="price" 
                       value="{{ old('price', $product->price ?? '') }}"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="0.00">
            </div>

           
            <div>
                <label for="category_id" class="block text-gray-700 font-semibold mb-2">Category</label>
                <select name="category_id" id="category_id"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- حالة البيع --}}
            <div class="flex items-center mt-6 md:mt-0">
                <input type="checkbox" name="on_sale" id="on_sale" class="mr-2"
                       {{ old('on_sale', $product->on_sale ?? false) ? 'checked' : '' }}>
                <label for="on_sale" class="text-gray-700 font-semibold">On Sale</label>
            </div>
        </div>

       
        <div>
            <label for="image" class="block text-gray-700 font-semibold mb-2">Product Image</label>
            <input type="file" name="image" id="image"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            
            @if(isset($product) && $product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" 
                     alt="Product Image" class="mt-4 w-32 h-32 object-cover rounded border">
            @endif
        </div>

        {{-- زر الإرسال --}}
        <div class="flex justify-end">
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded shadow">
                {{ isset($product) ? 'Update Product' : 'Add Product' }}
            </button>
        </div>
    </form>
</div>
@endsection
