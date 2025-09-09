@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Create Product</h1>

    @if ($errors->any())
        <div class="mb-4 rounded-lg bg-red-100 p-3 text-red-800">
            <ul class="list-disc ml-6">
                @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Name</label>
            <input name="name" value="{{ old('name') }}" class="w-full border rounded-lg p-2" required>
        </div>

        <div>
            <label class="block mb-1">Description</label>
            <textarea name="description" class="w-full border rounded-lg p-2" rows="4">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block mb-1">Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full border rounded-lg p-2" required>
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="on_sale" value="1" {{ old('on_sale') ? 'checked' : '' }}>
            <span>On Sale</span>
        </div>

        <div>
            <label class="block mb-1">Image</label>
            <input type="file" name="image" class="w-full border rounded-lg p-2">
        </div>

        <div class="flex items-center gap-3">
            <button class="px-4 py-2 rounded-lg bg-blue-600 text-white">Save</button>
            <a href="{{ route('products.index') }}" class="underline">Cancel</a>
        </div>
    </form>
</div>
@endsection
