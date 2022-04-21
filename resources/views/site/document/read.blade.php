
@extends('layouts.site.template')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <iframe src="{{ asset('file/' . $file->name) }}#toolbar=0" width="100%" height="800px"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
