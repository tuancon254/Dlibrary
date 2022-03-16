@extends('layouts.admin.master')
@section('contents')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Category Managerment</h4>
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
                    <a href="{{ route('class.list') }}">Class Create</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Class Create</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('class.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Class name</label>
                                        <input type="text" class="form-control" name="class_name" placeholder="Enter Class name">
                                    </div>
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <select id="class" name="semester_id" class="form-control student">
                                            <option value="">-- Chọn học kỳ --</option>
                                            @foreach ($semester as $sem)
                                                <option value="{{ $sem->sem_id }}">{{ $sem->sem_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <a href="{{ route('class.list') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
@stop
