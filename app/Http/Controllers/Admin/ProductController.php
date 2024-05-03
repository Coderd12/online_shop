<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at','DESC')->get();

        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.product.create',compact('subcategories',"brands"));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'subcategory' => 'required|exists:sub_categories,id',
            'brand' => 'required|exists:brands,id',
            "name" => "required|string|max:200|unique:products",
            "slug" => "required|string|max:200|unique:products",
            "price"=> "required|integer|min:0",
            "sale" => "required|integer|min:0|max:100",
            "quantity"=>"required|integer|min:0",
            "description"=>"required|string",
            "image" => "required|image",
            "status" => "nullable",
            "trending"=>'nullable'

        ]);

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext; //147785.png
            $file->move('uploads/product/',$filename);
            $validatedData['image'] = 'uploads/product/'.$filename;
        }

        $validatedData['status'] = $request->status == true ? '1':'0';
        $validatedData['trending'] = $request->trending == true ? '1':'0';

        // dd($validatedData['trending']);

        Product::create([
            'sub_category_id' => $validatedData['subcategory'],
            'brand_id' => $validatedData['brand'],
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'sale_percent'=> $validatedData['sale'],
            'price'=>$validatedData['price'],
            'quantity'=>$validatedData['quantity'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
            'trending' => $validatedData['trending'],
        ]);

        return redirect('admin/product')->with('message','Products Created Succassesfully ');
    }
}
