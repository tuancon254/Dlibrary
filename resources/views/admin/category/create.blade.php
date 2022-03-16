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
                <a href="{{route('user.list')}}">Create Category</a>
            </li>
        </ul>
    </div>
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Create Category</div>
        </div>
        <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Category Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter title" value="{{old('title')}}">
                        <div style="color:red;height:10px">@error('title'){{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{old('description')}}</textarea>
                        <div style="color:red;height:10px">@error('description'){{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <label>Root Category</label>
                        <select name="rootCategory" class="form-control">
                            <option value="0">Chọn danh mục cha</option>
                                {{!!$htmlOption!!}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Type</label>
                        <select name="categoryType" class="form-control">
                            <option value="">Chọn kiểu danh mục</option>
                            <option value="0">Unit</option>
                            <option value="1">Collection</option>
                        </select>
                    </div>
                </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-success" type="submit">Submit</button>
                    <a href="{{ route('category.list') }}" 
                        class="btn btn-danger">Cancel</a>
                    </div>
            </form>
        </div>
       
    
    </div>
</div>
</div>
</div>
@stop