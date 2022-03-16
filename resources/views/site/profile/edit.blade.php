@extends('layouts.site.template')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('site.profile.update') }}" method="post">
                            @csrf
                        <div class="card-header">
                            <div class="card-title">Profile</div>
                        </div>
                        <div class="card-body">
                            <div class="row col-md-12">
                                <div class="col-md-6 border-right">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                            class="rounded-circle mt-5" width="150px"
                                            src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                        <span class="font-weight-bold">{{ $user->name }}</span>
                                        <span class="text-black-50">{{ $user->email }}</span>
                                        <span> </span>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center">
                                        <div class="p-3 py-5">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="text-right">Profile Settings</h4>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label class="labels">Fullname</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                                                    <div style="color:red;height:10px">@error('name'){{ $message }} @enderror</div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <label class="labels">Username</label>
                                                    <input type="text" class="form-control" value="{{ $user->username }}"
                                                        disabled>
                                                    <div style="color:red;height:10px"></div>
                                                    <br>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="labels">Email</label>
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
                                                    <div style="color:red;height:10px">@error('email'){{ $message }} @enderror</div>
                                                    <br>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="labels">Phone Numbers</label>
                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone_number }}">
                                                    <div style="color:red;height:10px">@error('phone'){{ $message }} @enderror</div>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="text-center">
                                <button class="btn btn-primary profile-button" type="submit">Save Changes</button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .info {
            font-size: 16px;
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
