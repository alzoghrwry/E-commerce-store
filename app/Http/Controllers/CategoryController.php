<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // عرض جميع الفئات
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('shop.categories.index', compact('categories'));
    }

    // صفحة إضافة فئة جديدة
    public function create()
    {
        return view('shop.categories.create');
    }

    // حفظ فئة جديدة
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'slug' => 'required|string|min:2|max:255|unique:categories,slug',
        ]);

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // صفحة تعديل فئة
    public function edit(Category $category)
    {
        return view('shop.categories.edit', compact('category'));
    }

    // تحديث الفئة
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'slug' => 'required|string|min:2|max:255|unique:categories,slug,' . $category->id,
        ]);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // حذف الفئة
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
