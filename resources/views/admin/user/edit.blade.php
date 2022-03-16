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
                    <a href="#">Users Edit</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">User Edit</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update',['id' => $user->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{$user->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" name="username" placeholder="Enter Username" value="{{$user->username}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="name" class="form-control" name="name" placeholder="Enter Name" value="{{$user->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="phone" class="form-control" name="phone"
                                            placeholder="Enter Phone Number" value="{{$user->phone_number}}">
                                    </div>
                                </div>
                                @if($userrole->role_id == 4)
                                <div class="col-md-6 col-lg-6 border-left" id="a">
                                    <div class="form-group ">
                                        <label>First Name</label>
                                        <input class="form-control student" placeholder="Enter firstname" name="fname" value="{{$students->first_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input class="form-control student" placeholder="Enter lastname" name="lname" value="{{$students->last_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Class</label>
                                        <select id="class" name="class_id" class="form-control student">
                                            <option value="">-- Chọn lớp quản lý --</option>
                                            @foreach ($class as $cl)
                                                <option <?php if($cl->class_id == $students->class_id) echo 'selected' ?> value="{{ $cl->class_id }}">{{ $cl->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Student Code</label>
                                        <input class="form-control student" placeholder="Enter student code" name="scode" value="{{$students->student_id}}">
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <a href="{{ route('user.list') }}" class="btn btn-danger">Cancel</a>
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
