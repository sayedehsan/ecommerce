<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subcategory\SubcategoryStoreRequest;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function index(){
        $getCategories = Category::where('status','active')->get();
        // $getSubcategories = Subcategory::with(['category' => function ($query) {
        //                     $query->where('status', 'active');
        //                     }])->get();
        $getSubcategories = Subcategory::with('category')->get();
        // dd($getSubcategories);
        return view('admin.subcategory.index',compact('getCategories','getSubcategories'));
    }

    public function store(SubcategoryStoreRequest $request){
        $subcategory = new Subcategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug(strtolower(str_replace(' ', '-',$request->name)));
        $subcategory->status = $request->status;
        $subcategory->save();

        return redirect()->back()->with('success','Subcategory created successfully');
    }

    public function edit($id){
        $subcategory = Subcategory::find($id);
        $getCategories = Category::where('status','active')->get();
        return view('admin.subcategory.edit', compact('subcategory','getCategories'));

    }

    public function update(SubcategoryStoreRequest $request, Subcategory $subcategory){
        $id = $request->id;
        $subcategory = Subcategory::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug(strtolower(str_replace(' ', '-',$request->name)));
        $subcategory->status = $request->status;
        $subcategory->save();
        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy($id){
        $subcategory = Subcategory::find($id);
        if ($subcategory) {
            $subcategory->delete();
            return redirect()->route('admin.subcategories.index')->with('success', 'Subcategory deleted successfully.');
        } else {
            return redirect()->route('admin.subcategories.index')->with('error', 'Subcategory not found.');
        }
    }
}
