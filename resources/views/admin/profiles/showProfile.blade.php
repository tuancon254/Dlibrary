@extends('layouts.admin.master')
@section('contents')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Profile</div>
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
                                    </div>
                                    <div class="mt-5 text-center"><a href="{{route('profile.edit')}}"><button class="btn btn-primary profile-button"
                                            type="button">Edit Profile</button></a></div>
                                </div>
                            </div>
                        </div>
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
