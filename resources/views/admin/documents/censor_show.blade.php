@extends('layouts.admin.master')
@section('contents')
    <div class="page-inner">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-9">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="page-title">Approval Document</h4>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('documents.approve', ['id' => $data->document_id]) }}"
                            class="btn btn-primary">
                            <i class="fa fa-check"></i>  Accept
                        </a>
                        <a href="{{ route('documents.delete', ['id' => $data->document_id]) }}"
                            class="btn btn-danger ml-2">
                            <i class="fas fa-times-circle"></i>  Deny
                        </a>
                    </div>
                </div>
                <div class="page-divider"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-invoice">
                            <div class="card-header">
                                <div class="invoice-header">
                                    <h3 class="invoice-title">
                                        <strong>{{$data->title}}</strong>
                                    </h3>
                                </div>
                                <div class="invoice-desc">
                                    {{$data->description}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="separator-solid"></div>
                                <div class="row">
                                    <div class="col-md-4 info-invoice">
                                        <h4 class="sub"><strong>Author</strong></h4>
                                        <p>{{$data->author}}</p>
                                    </div>
                                    <div class="col-md-4 info-invoice">
                                        <h4 class="sub"><strong>Date of Issue</strong></h4>
                                        <p>{{ \Carbon\Carbon::parse($data->date_of_issue)->format('Y')}}</p>
                                    </div>
                                    <div class="col-md-4 info-invoice">
                                        <h4 class="sub"><strong>Category</strong></h4>
                                        <p>{{ $category->title}}</p>
                                    </div>
                                </div>
                                <div class="separator-solid"></div>
                                <div class="row">
                                    <div class="col-md-4 info-invoice">
                                        <h5 class="sub">Upload Date</h5>
                                        <p>{{$data->created_at->format('Y-m-d')}}</p>
                                    </div>
                                    <div class="col-md-4 info-invoice">
                                        <h5 class="sub">Upload Time</h5>
                                        <p>{{$data->created_at->format('H:i:s')}}</p>
                                    </div>
                                    <div class="col-md-4 info-invoice">
                                        <h5 class="sub">Uploader</h5>
                                        <p>{{$data->user->name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="invoice-detail">
                                            <div class="invoice-top">
                                                <h3 class="title"><strong>File information</strong></h3>
                                            </div>
                                            <div class="invoice-item">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <td><strong>Image</strong></td>
                                                                <td class="text-center"><strong>File name</strong></td>
                                                                <td class="text-center"><strong>Type</strong></td>
                                                                <td class="text-center"><strong>Size</strong></td>
                                                                <td class="text-right"><strong>Action</strong></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>null</td>
                                                                <td class="text-center">{{$file->name}}</td>
                                                                <td class="text-center">{{$file->type}}</td>
                                                                <td class="text-center">{{$file->size}}</td>
                                                                <td class="text-right">
                                                                    <a href="{{ route('documents.read', ['id' => $data->document_id]) }}">
                                                                    <button class="btn btn-sm btn-primary">
                                                                        Read
                                                                    </button>
                                                                </a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator-solid  mb-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

