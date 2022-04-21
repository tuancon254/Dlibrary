@extends('layouts.site.template')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Change Password</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <div class="col-lg-5">
                                        <form action="{{ route('site.profile.updatepassword') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password"
                                                    class="form-control @error('new_password') is-invalid @enderror"
                                                    name="new_password" placeholder="Enter New Password">
                                                @error('new_password')
                                                    <div style="color:red;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Repeat New Password</label>
                                                <input type="password"
                                                    class="form-control @error('rpt_new_password') is-invalid @enderror"
                                                    name="rpt_new_password" placeholder="Enter Repeat New Password">
                                                @error('rpt_new_password')
                                                    <div style="color:red;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group d-flex justify-content-center">
                                                <button class="btn btn-primary" type="submit">Save Changes</button>
                                            </div>
                                        </form>
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
