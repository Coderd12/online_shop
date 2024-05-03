@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit SubCategory
                        <a href="{{url('admin/subcategory')}}" class="btn btn-primary btn-sn text-white float-end">
                            Back
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/subcategory/' . $subcategory->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category_id" id="category" required>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $subcategory->name}}">
                                @error('name') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{$subcategory->slug}}">
                                @error('slug') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
