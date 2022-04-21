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
                    <a href="#">Users Create</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">User Create</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                                        <div style="color:red;height:10px">@error('email'){{ $message }} @enderror</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Enter Username" value="{{ old('username') }}">
                                        <div style="color:red;height:10px">@error('username'){{ $message }} @enderror</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Name" value="{{ old('name') }}">
                                        <div style="color:red;height:10px">@error('name'){{ $message }} @enderror</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            placeholder="Enter Phone Number" value="{{ old('phone') }}">
                                            <div style="color:red;height:10px">@error('phone'){{ $message }} @enderror</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select id="role" name="role_id" class="form-control">
                                            <option value="">-- Chọn quyền hệ thống --</option>
                                            @foreach ($roles as $role)
                                                <option id="r" value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color:red;height:10px"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 border-left" id="a">
                                    <div class="form-group ">
                                        <label>First Name</label>
                                        <input class="form-control student @error('fname') is-invalid @enderror" placeholder="Enter firstname" name="fname" value="{{ old('fname') }}">
                                        <div style="color:red;height:10px">@error('fname'){{ $message }} @enderror</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input class="form-control student @error('lname') is-invalid @enderror" placeholder="Enter lastname" name="lname" value="{{ old('lname') }}">
                                        <div style="color:red;height:10px">@error('lname'){{ $message }} @enderror</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Class</label>
                                        <select id="class" name="class_id" class="form-control student">
                                            <option value="">-- Chọn lớp quản lý --</option>
                                            @foreach ($class as $cl)
                                                <option value="{{ $cl->class_id }}">{{ $cl->class_name }}</option>
                                            @endforeach
                                        </select>
                                        <div style="color:red;height:10px">@error('class_id'){{ $message }} @enderror</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Student Code</label>
                                        <input class="form-control student @error('scode') is-invalid @enderror" placeholder="Enter student code" name="scode" value="{{ old('scode') }}">
                                        <div style="color:red;height:10px">@error('scode'){{ $message }} @enderror</div>
                                    </div>
                                </div>
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
    <script>
        $(document).ready(function() {
            $("#a").hide()
            $(".student").prop("disabled", true);
            $("#role").change(function() {
                if ($(this).find(":selected").text() == "Sinh viên") {
                    $(".student").prop("disabled", false);
                    $("#a").show()
                } else {
                    $("#a").hide()
                    $(".student").prop("disabled", true);
                }
            })
        })
    </script>
@stop
