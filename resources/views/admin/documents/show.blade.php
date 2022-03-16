@extends('layouts.admin.master')
@section('contents')
    <div class="page-inner">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-9">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="page-title">Document Information</h4>
                    </div>
                    <div class="col-auto">
                        @can('documents-create')
                            <a href="{{ route('documents.edit', ['id' => $data->document_id]) }}" class="btn btn-primary">
                                <span class="btn-label">
                                    <i class="fas fa-edit"></i>
                                </span>
                                Edit
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="page-divider"></div>
                <div class="row">
                    <div class="col-md-12">
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
                                    <div class="col-md-4 info-invoice">
                                        <h5 class="sub">Upload Date</h5>
                                        <p>{{ $data->created_at->format('Y-m-d') }}</p>
                                    </div>
                                    <div class="col-md-4 info-invoice">
                                        <h5 class="sub">Upload Time</h5>
                                        <p>{{ $data->created_at->format('H:i:s') }}</p>
                                    </div>
                                    <div class="col-md-4 info-invoice">
                                        <h5 class="sub">Status</h5>
                                        <span class="badge badge-<?php if ($data->approved === 1) {
    echo 'success';
} else {
    echo 'warning';
} ?>">@if ($data->approved === 1) Active @else Waiting @endif</span>
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
                                                                <td>Updating</td>
                                                                <td class="text-center">{{ $file->name }}</td>
                                                                <td class="text-center">{{ $file->type }}</td>
                                                                <td class="text-center">{{ $file->size }}</td>
                                                                <td class="text-right">
                                                                    @if ($active === '1')
                                                                        <a href="{{ route('documents.download', ['id' => $data->file->id]) }}"
                                                                            class="btn btn-sm btn-primary">Download</a>
                                                                        <a href="{{ route('documents.read', ['id' => $data->document_id]) }}"
                                                                            class="btn btn-sm btn-primary">Read</a>
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

@stop
