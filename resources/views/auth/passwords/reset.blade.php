@extends('layouts.admin.login')

@section('content')
    <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('password.update') }}">
        <div style="text-align: center; padding-top:20px;font-size: 20px">Reset Password</div>
        <br>
        <div>
            <input type="hidden" name="token" value="{{ $token }}">
            @csrf
            <div class="wrap-input100">
                <input class="input100 @error('email') is-invalid @enderror" id="email" type="email" name="email"
                    value="{{ $email ?? old('email') }}">
                @error('email')
                    <div style="padding-left:60px;color:red; font-size:14px"><i
                            class="icon-user-unfollow"></i>{{ $message }}</div>
                @enderror
                <span class="focus-input100" data-placeholder="&#xe82a;"></span>
            </div>
            <div class="wrap-input100">
                <input class="input100 @error('password') is-invalid @enderror" id="password" type="password" name="password"
                    placeholder="New Password" required autocomplete="new-password" autofocus>
                @error('password')
                    <div style="padding-left:60px;color:red; font-size:14px"><i
                            class="icon-user-unfollow"></i>{{ $message }}</div>
                @enderror
                <span class="focus-input100" data-placeholder="&#xe80f;"></span>
            </div>
            <div class="wrap-input100">
                <input class="input100 @error('password-confirm') is-invalid @enderror" id="password-confirm"
                    type="password" name="password_confirmation" placeholder="Confirm Password" required
                    autocomplete="new-password">
                @error('password-confirm')
                    <div style="padding-left:60px;color:red; font-size:14px"><i
                            class="icon-user-unfollow"></i>{{ $message }}</div>
                @enderror
                <span class="focus-input100" data-placeholder="&#xe80f;"></span>
            </div>
            <div class="container-login100-form-btn m-t-32">
                <button type="submit" class="login100-form-btn">
                    Reset Password
                </button>
            </div>
        </div>
    </form>
@endsection
