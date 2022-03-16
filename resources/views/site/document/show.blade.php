@extends('layouts.site.template')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="page-title">Document Information</h4>
                        </div>
                    </div>
                    <div class="page-divider"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-invoice">
                                <div class="card-header">
                                    <div class="invoice-header">
                                        <h3 class="invoice-title">
                                            <strong>{{ $data->title }}</strong>
                                        </h3>
                                    </div>
                                    <div class="invoice-desc">
                                        {{ $data->description }}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="separator-solid"></div>
                                    <div class="row">
                                        <div class="col-md-4 info-invoice">
                                            <h4 class="sub"><strong>Author</strong></h4>
                                            <p>{{ $data->author }}</p>
                                        </div>
                                        <div class="col-md-4 info-invoice">
                                            <h4 class="sub"><strong>Date of Issue</strong></h4>
                                            <p>{{ \Carbon\Carbon::parse($data->date_of_issue)->format('Y') }}</p>
                                        </div>
                                        <div class="col-md-4 info-invoice">
                                            <h4 class="sub"><strong>Category</strong></h4>
                                            <p>{{ $category->title }}</p>
                                        </div>
                                    </div>
                                    <div class="separator-solid"></div>

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
                                                                    <td class="text-center"><strong>File name</strong>
                                                                    </td>
                                                                    <td class="text-center"><strong>Type</strong></td>
                                                                    <td class="text-center"><strong>Size</strong></td>
                                                                    <td class="text-right"><strong>Action</strong></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><img src="{{ asset('/site/images/pdf.jpg') }}"
                                                                        style="width:150px;height: 160px; margin-top:10px;margin-bottom:10px; border-radius: 5px"></td>
                                                                    <td class="text-center">{{ $file->name }}</td>
                                                                    <td class="text-center">{{ $file->type }}</td>
                                                                    <td class="text-center">{{ $file->size }}</td>
                                                                    <td class="text-right">
                                                                        @if ($active === '1')
                                                                            <a href="{{ route('documents.download', ['id' => $data->file->id]) }}"
                                                                                class="btn btn-sm btn-primary">Download</a>
                                                                            <a href="{{ route('site.document.read', ['id' => $data->document_id]) }}"
                                                                                class="btn btn-sm btn-primary">Read</a>
                                                                        @else
                                                                        <span class="badge badge-danger">Private</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="separator-solid mb-3"></div>
                                        </div>
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
