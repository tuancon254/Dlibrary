@extends('layouts.admin.login')

@section('content')
    <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('password.email') }}">
        <div style="text-align: center; padding-top:20px;font-size: 20px">Reset Password</div>
        <br>
        <div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @else
            @csrf
            <div class="wrap-input100">
                <input class="input100 @error('email') is-invalid @enderror" id="email" type="email" name="email"
                    placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <div style="padding-left:60px;color:red; font-size:14px"><i
                            class="icon-user-unfollow"></i>{{ $message }}</div>
                @enderror
                <span class="focus-input100" data-placeholder="&#xe82a;"></span>
            </div>
            <div class="container-login100-form-btn m-t-32">
                <button type="submit" class="login100-form-btn">
                    Send Password Reset Link
                </button>
            </div>
            @endif

            
        </div>
    </form>

@endsection