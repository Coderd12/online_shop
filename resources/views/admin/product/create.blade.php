@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Add Product
                </div>


                <div class="card-body">
                    <form action="{{url('admin/product')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12 mb-3">
                            <button  class="btn btn-primary float-end" type="submit">SAVE</button>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="subcategory">SubCategory Select</label>
                                <select class="form-control"  id="subcategory" name="subcategory" required>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}" {{old('subcategory_id') == $subcategory->id ? 'selected' : ''}}>
                                            {{$subcategory->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('subcategory_id') <small class="text-danger">{{$message}}</small>@enderror
                            </div>



                            <div class="form-group">
                                <label for="brand">Brand Select</label>
                                <select class="form-control"  id="brand" name="brand" required>
                                    @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}" {{old('brand') == $brand->id ? 'selected' : ''}}>
                                            {{$brand->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('brand') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="brand">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name" required>
                                @error('name') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="brand">Product Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{old('slug')}}" id="slug" required>
                                @error('slug') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="price">Product Price</label>
                                <input type="number" name="price" class="form-control" value="{{old('price')}}" min="0" id="slug" required>
                                @error('price') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="price">Product Sale Percent</label>
                                <input type="number" name="sale" class="form-control" value="{{old('sale')}}" min="0" max="100" id="sale" required>
                                @error('sale') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="price">Product Quantity</label>
                                <input type="number" name="quantity" class="form-control" value="{{old('quantity')}}" min="1"  id="quantity" required>
                                @error('quantity') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="description">Product Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4" value="{{old('description')}}"></textarea>
                                @error('description') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="price">Product Image</label>
                                <input type="file" name="image" class="form-control"   id="image" required >
                                @error('image') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <input type="checkbox" name="status" value="{{old('status')}}"  >
                                    (Checked = Private , Unchecked = Public)
                                @error('status') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="trending">Trending</label>
                                    <input type="checkbox" name="trending" value="{{old('trending')}}"  >
                                    (Checked = Private , Unchecked = Public)
                                @error('trending') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                            </div>



                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
