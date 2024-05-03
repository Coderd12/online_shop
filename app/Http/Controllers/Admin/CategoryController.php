<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
   public function index()
   {
    $categories = Category::all();
    return view('admin.category.index', compact('categories'));
   }

   public function create()
   {
    return view('admin.category.create');
   }

   public function store(Request $request)

   {
    // dd($request->all());
    $validateData = $request->validate([
        "name" => "required|max:50|unique:categories",
        "slug" => "required|max:50|unique:categories",
        "status" => "nullable",
        "image" => "required|image|mimes:jpg,png,svg"
    ]);

    if($request->hasFile('image'))
    {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext; //147785.png
        $file->move('uploads/category/',$filename);
        $validateData['image'] = 'uploads/category/'.$filename;
    }

    $validateData['status'] = $request->status == true ? '1':'0';

    Category::create([
        'name' => $validateData['name'],
        'slug' => $validateData['slug'],
        'status' => $validateData['status'],
        'image' => $validateData['image']
    ]);

    return redirect('admin/category')->with('message','Category Created Succassesfully ');


   }
   public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $validateData = $request->validate([
        "name" => "required|max:50|unique:categories,name," . $category->id,
        "slug" => "required|max:50|unique:categories,slug," .$category->id,
        "status" => "nullable",
        "image" => "required|image|mimes:jpg,png,svg"
        ]);

        if($request->hasFile('image'))
    {

        if(File::exists($category->image)){
            File::delete($category->image);
        }

        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext; //147785.png
        $file->move('uploads/category/',$filename);
        $validateData['image'] = 'uploads/category/'.$filename;
    }

    $validateData['status'] = $request->status == true ? '1':'0';

    $category->update($validateData);

    return redirect('admin/category')->with('message','Category updated successfully');

    }
    public function destroy($id)
    {
        $category = Category::find($id);
        if (File::exists($category->image)){
            File::delete($category->image);
        }
        $category->delete();
        return redirect('admin/category')->with('message','Category deleted Successfully');
    }

}
