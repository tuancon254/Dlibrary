@extends('layouts.admin.master')
@section('contents')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <iframe src="{{ asset('file/' . $file->name) }}" width="100%" height="800px"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <iframe src="{{url('https://docs.google.com/document/d/1oITlp4TlLs7_TikHCHb6bxmGsWFrl0a5')}}" width='100%' height='800px' frameborder='0'> </iframe> --}}
    {{-- <iframe src="https://onedrive.live.com/embed?cid=AF0FEEA7195E0473&resid=AF0FEEA7195E0473%211230&authkey=AK678GffflLof-I&em=2" width="100%" height="800" frameborder="0" scrolling="no"></iframe> --}}

@endsection
