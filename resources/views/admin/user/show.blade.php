@extends('layouts.admin.master')
@section('contents')


    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Users Managerment</h4>
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
                    <a href="#">User Information</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Users Information</div>
                        {{-- @can('user-create') --}}
                            <div>
                                <a href="{{ route('user.edit', ['id' => $user->id]) }}">
                                    <button class="btn btn-primary">
                                        <span class="btn-label">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        Edit
                                    </button>
                                </a>
                            </div>
                        {{-- @endcan --}}

                    </div>
                    <div class="card-body">
                        <div class="row col-md-12">
                            <div class="col-md-4 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                        class="rounded-circle mt-5" width="150px"
                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                                        class="font-weight-bold">{{ $user->name }}</span><span
                                        class="text-black-50">{{ $user->email }}</span><span> </span></div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Account Information</h4>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label class="labels">Fullname</label>
                                            <div class="info">{{ $user->name }}</div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Username</label>
                                            <div class="info">{{ $user->username }}</div>
                                            <br>
                                        </div>
                                        <div class="col-md-12"><label class="labels">Email</label>
                                            <div class="info">{{ $user->email }}</div>
                                            <br>
                                        </div>
                                        <div class="col-md-12"><label class="labels">Phone Numbers</label>
                                            <div class="info">{{ $user->phone_number }}</div>
                                        </div>
                                        <div class="col-md-12"><label class="labels">Role</label>
                                            <div class="info">{{ $userrole->role_name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($userrole->role_id === 4)
                            <div class="col-md-4 border-left">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Students Information</h4>
                                    </div>
                                    
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label class="labels">First Name</label>
                                            <div class="info">{{ $students->first_name }}</div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Last Name</label>
                                            <div class="info">{{ $students->last_name }}</div>
                                            <br>
                                        </div>
                                        <div class="col-md-12"><label class="labels">Class</label>
                                            <div class="info">{{ $class->class_name }}</div>
                                            <br>
                                        </div>
                                        <div class="col-md-12"><label class="labels">Student Code</label>
                                            <div class="info">{{ $students->student_id }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-action d-flex justify-content-center">
                        <a href="{{route('user.list')}}">
                            <button class="btn btn-danger">
                                Return
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
@stop

@section('css')
    <style>
        .info {
            font-size: 16px;
            padding-top: 10px;
            padding-bottom: 15px;
            color: rgb(141, 138, 138);
        }

        label {
            font-weight: bold;
            font-size: 20px;
        }

        h4 {
            font-size: 22px
        }

    </style>
@stop
