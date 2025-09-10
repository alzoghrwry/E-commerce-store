@extends('layouts.app')

@section('title', 'Categories | RedStore')

@section('content')
<div class="max-w-5xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Categories</h1>
        <a href="{{ route('categories.create') }}" 
           class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded shadow">
           Add New Category
        </a>
    </div>

    {{-- عرض رسائل النجاح --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 text-left text-gray-700 font-semibold">ID</th>
                    <th class="py-3 px-4 text-left text-gray-700 font-semibold">Name</th>
                    <th class="py-3 px-4 text-left text-gray-700 font-semibold">Slug</th>
                    <th class="py-3 px-4 text-left text-gray-700 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr class="border-b border-gray-200">
                    <td class="py-2 px-4">{{ $category->id }}</td>
                    <td class="py-2 px-4">{{ $category->name }}</td>
                    <td class="py-2 px-4">{{ $category->slug }}</td>
                    <td class="py-2 px-4 flex gap-2">
                        <a href="{{ route('categories.edit', $category->id) }}" 
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>

                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-4 px-4 text-center text-gray-500">No categories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
