@extends('layouts.site.template')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <img src="{{ asset('/site/images/backgr.jpg') }}" alt=""
                            style="border-radius: 5px; height: 340px;">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Search By</div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Category && Collection</li>
                                <li class="list-group-item">Author</li>
                                <li class="list-group-item">Date of Issue</li>
                                <li class="list-group-item">Title</li>
                                <li class="list-group-item">Topic</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-title row d-flex justify-content-around align-items-center">
                <span class="border-top col-lg-5" style="border: 2px solid black"></span>
                <h2>Category</h2>
                <span class="border-top col-lg-5" style="border: 2px solid black"></span>
            </div>
            <div class="row row-projects">
                @foreach ($category as $cate)
                    <div class="col-sm-6 col-lg-4">
                        <a href="{{ route('site.category.show', ['id' => $cate->id]) }}" class="stretched-link">
                            <div class="card">
                                <div class="p-2">
                                    <img class="card-img-top rounded" src="{{ asset('/site/images/category.png') }}"
                                        alt="Product 1">
                                </div>
                                <div class="card-body pt-2">
                                    <h4 class="mb-1 fw-bold">{{ $cate->title }}</h4>
                                    <p class="text-muted small mb-2">{{ $cate->description }}</p>
                                </div>
                            </div>
                    </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@stop
