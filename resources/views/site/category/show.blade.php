@extends('layouts.site.template')
@section('content')
    <div class="container">
        <div class="page-inner">
            @if ($category->is_collection === 0)
                <div class="page-title row d-flex justify-content-around align-items-center">
                    <span class="border-top col-lg-5" style="border: 2px solid black"></span>
                    <h2>Collection</h2>
                    <span class="border-top col-lg-5" style="border: 2px solid black"></span>
                </div>
                <div class="row row-projects">
                    @foreach ($childCategory as $cate)
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
            @else
                <div class="page-title row d-flex justify-content-around align-items-center">
                    <span class="border-top col-lg-3" style="border: 2px solid black"></span>
                    <h2>{{ $category->title }}</h2>
                    <span class="border-top col-lg-3" style="border: 2px solid black"></span>
                </div>
                @foreach ($document as $doc)
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between">
                                <div class="col-lg-2">
                                    <img src="{{ asset('/site/images/pdf.jpg') }}"
                                        style="width:150px;height: 160px; margin-top:10px;margin-bottom:10px; border-radius: 5px">
                                </div>
                                <div class="col-lg-8" style="padding-left:100px;margin-top:20px; height: 100%;">
                                    <h2>{{ $doc->title }}</h2>
                                    <span style="font-weight: bold">Author : {{ $doc->author }}</span>
                                    <div style="margin-top:10px">{{ $doc->description }}</div>
                                </div>
                                <div class="col-lg-2" style="padding-top: 50px">
                                    <a href="{{ route('site.document.show', ['id' => $doc->document_id]) }}"
                                        class="btn btn-primary btn-lg">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-md-12">{{ $document->links() }}</div> --}}
            @endif
        </div>
    </div>

@stop
