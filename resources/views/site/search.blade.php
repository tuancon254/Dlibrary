@extends('layouts.site.template')
@section('content')
<div class="container">
    <div class="page-inner">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('site.search')}}" method="get">
                    <div class="row d-flex justify-content-around">
                        <div class="form-group col-lg-5" style="margin-top:26px">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search for..." name="keyword">
                                <span class="input-icon-addon">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-lg-1" style="margin-top:26px">
                            <div><button class="btn btn-primary" type="submit">Search</button></div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="defaultSelect">Search by</label>
                            <select class="form-control searchby" name="search_by" id="defaultSelect">
                                <option value="all">All</option>
                                <option value="title">Title</option>
                                <option value="author">Author</option>
                                <option value="date_of_issue">Date of Issue</option>
                                <option value="category_id">Category</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="defaultSelect">Collection</label>
                            <select class="form-control category" name="collection" id="defaultSelect">
                                <option value="">All</option>
                                {{!! $htmlOption !!}}
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Images</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $doc)
                            <tr>
                                <th><img src="{{asset('/site/images/pdf.jpg')}}" style="width:150px;height: 160px; margin-top:10px;margin-bottom:10px; border-radius: 5px"></th>
                                <td>{{ $doc->title }}</td>
                                <td>{{ $doc->author }}</td>
                                <td class="text-center">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <a href="{{ route('site.document.show', ['id' =>$doc->document_id]) }}" class="btn btn-primary btn-sm">Show</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">{{ $data->links() }}</div>
        </div>
    </div>
</div>
    </div>
</div>
@stop
