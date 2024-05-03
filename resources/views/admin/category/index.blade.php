@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Category
                        <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm text-white float-end">
                            Create Category
                        </a>
                    </h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $item )
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->slug}}</td>
                                    <td>
                                        <img src="{{asset($item->image)}}" height="100px" width="100px">
                                    </td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <a href="{{url('admin/category/edit/' . $item->id)}}" class="btn btn-success btn-sm">
                                            EDIT
                                        </a>
                                        {{-- <a href="{{url('admin/category/delete/' . $item->id)}}" class="btn btn-success btn-sm">
                                            DELETE
                                        </a> --}}
                                        <a href="{{url('admin/category/delete/' .$item->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are delete this data')">
                                            Delete
                                        </a>
                                    </td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
