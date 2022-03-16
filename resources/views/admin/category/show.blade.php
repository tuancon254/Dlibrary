@extends('layouts.admin.master')
@section('contents')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Collection</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('home.index') }}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('documents.index') }}">{{ $category->title }}</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" name="search" id="search" type="text"
                                    placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                        <div>
                            <a href="{{ route('documents.create') }}">
                                <button class="btn btn-primary">
                                    <span class="btn-label">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    Create
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($childCategory as $child)
                            <div>{{$child->title}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
