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
                    <a href="{{ route('user.role') }}">Role Edit</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Role Edit</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.role.update', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label>Tên/Tài khoản:</label>
                                        <div class="name"><b style="font-size:24px;">{{ $user->name }}/{{$user->username}}</b></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select id="role" name="role_id" class="form-control">
                                            <option value="">-- Chọn quyền hệ thống --</option>
                                            @foreach ($roles as $role)
                                                <option <?php if($role->role_id == $userrole->role_id) echo 'selected' ?> value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <a href="{{ route('user.role') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
