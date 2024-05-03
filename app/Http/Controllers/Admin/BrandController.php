<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
   {
    $brands = Brand::all();
    return view('admin.brand.index', compact('brands'));
   }

   public function create()
   {
    return view('admin.brand.create');
   }

   public function store(Request $request)

   {
    // dd($request->all());
    $validateData = $request->validate([
        "name" => "required|max:50|unique:brands",
        "slug" => "required|max:50|unique:brands",
        "status" => "nullable",
        "image" => "required|image|mimes:jpg,png,svg"
    ]);

    if($request->hasFile('image'))
    {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext; //147785.png
        $file->move('uploads/brand/',$filename);
        $validateData['image'] = 'uploads/brand/'.$filename;
    }

    $validateData['status'] = $request->status == true ? '1':'0';

    Brand::create([
        'name' => $validateData['name'],
        'slug' => $validateData['slug'],
        'status' => $validateData['status'],
        'image' => $validateData['image']
    ]);

    return redirect('admin/brand')->with('message','Brand Created Succassesfully ');


   }
   public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);

        $validateData = $request->validate([
        "name" => "required|max:50|unique:brands,name," . $brand->id,
        "slug" => "required|max:50|unique:brands,slug," .$brand->id,
        "status" => "nullable",
        "image" => "required|image|mimes:jpg,png,svg"
        ]);

        if($request->hasFile('image'))
    {

        if(File::exists($brand->image)){
            File::delete($brand->image);
        }

        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext; //147785.png
        $file->move('uploads/brand/',$filename);
        $validateData['image'] = 'uploads/brand/'.$filename;
    }

    $validateData['status'] = $request->status == true ? '1':'0';

    $brand->update($validateData);

    return redirect('admin/brand')->with('message','Brand updated successfully');

    }
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (File::exists($brand->image)){
            File::delete($brand->image);
        }
        $brand->delete();
        return redirect('admin/brand')->with('message','Brand deleted Successfully');
    }

}
