<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('admin.subcategory.index',compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:100|unique:sub_categories,name'
        ]);

        SubCategory::create([
            'category_id' =>  $validatedData['category_id'],
            'name' =>  $validatedData['name'],
            'slug' =>  $validatedData['name'],
        ]);

        return redirect('admin/subcategory')->with('message','SubCategory created successfully');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::find($id);
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);

        $validateData = $request->validate([
        "name" => "required|max:50|unique:categories,name," . $subcategory->id,
        "slug" => "required|max:50|unique:categories,slug," .$subcategory->id,
        ]);



    $subcategory->update($validateData);

    return redirect('admin/subcategory')->with('message','SubCategory updated successfully');

    }

    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);

        $subcategory->delete();
        return redirect('admin/subcategory')->with('message','SubCategory deleted Successfully');
    }
}
