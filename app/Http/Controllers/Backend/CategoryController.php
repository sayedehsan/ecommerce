<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $getData = Category::all();
        return view('admin.category.index',compact('getData'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryStoreRequest $request)
    {
        $icon = "fas fa-columns";
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug(strtolower(str_replace(' ', '-', $request->name)));
        $category->icon = $icon;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');

    }

    public function edit($id)
    {
        $category = Category::find($id);
        // dd($category);
        return view('admin.category.edit', compact('category'));
    }
    public function update(CategoryStoreRequest $request, Category $category)
    {
        $id = $request->id;
        $category = Category::find($id);
        $category->name = $request->name;
        $category->icon = "fas fa-columns";
        $category->slug = Str::slug(strtolower(str_replace(' ', '-', $request->name)));
        $category->status = $request->status;
        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
        } else {
            return redirect()->route('admin.categories.index')->with('error', 'Category not found.');
        }
    }
}
