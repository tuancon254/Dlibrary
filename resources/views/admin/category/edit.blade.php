@extends('layouts.admin.master')
@section('contents')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Category Management</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{route('home.index')}}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{route('user.list')}}">Edit Category</a>
            </li>
        </ul>
    </div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Edit Category</div>
        </div>
        <div class="card-body">
                <form action="{{ route('category.update',['id' => $category->id]) }}" method="POST">
                @csrf
                <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Category Title</label>
                        <input type="text" class="form-control" value="{{$category->title}}" name="title" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="5">{{$category->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Root Category</label>
                        <select name="rootCategory" class="form-control">
                            <option value="0">-- Chọn thư mục cha --</option>
                            {{!! $htmlOption !!}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Type</label>
                        <select name="categoryType" class="form-control" disabled>
                            <option value="">Chọn kiểu danh mục</option>
                            <option <?php if($category->is_collection == 0) echo "selected" ?> value="0">Unit</option>
                            <option <?php if($category->is_collection == 1) echo "selected" ?> value="1">Collection</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    @if ($category->is_collection === 0)
                    <div class="form-group">
                        <label>Child Category</label>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    @can('category-edit')
                                        <th scope="col" class="text-center">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category->childCategory as $child)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $child->title }}</td>
                                        <td class="text-center">
                                            <div class="row d-flex justify-content-center align-items-center">
                                                @can('category-delete')
                                                    <a href="{{ route('category.delete', ['id' => $child->id]) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-success" type="submit">Submit</button>
                    <a href="{{ route('category.list') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@stop
 