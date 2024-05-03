@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Brand
                        <a href="{{url('admin/brand')}}" class="btn btn-primary btn-sn text-white float-end">
                            Back
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/brand/' . $brand->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $brand->name}}">
                                @error('name') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{$brand->slug}}">
                                @error('slug') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="image">Logo</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{asset($brand->image)}}" height="70px" width="70px" alt="image">
                                @error('image') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" {{$brand->status=="1" ? 'checked': ""}}>
                                @error('status') <small class="text-danger">{{$message}}</small>@enderror
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
