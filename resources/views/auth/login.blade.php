@extends('layouts.admin.login')
@section('content')
                <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="wrap-input100">
                        <input class="input100 @error('email') is-invalid @enderror" id="email" type="email" name="email"
                            placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <div style="padding-left:60px;color:red; font-size:14px"><i class="icon-user-unfollow"></i>{{ $message }}</div>
                        @enderror
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                    <div class="wrap-input100">
                        <input class="input100 @error('password') is-invalid @enderror" id="password" type="password"
                            name="password" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <div>{{ $message }}</div>
                        @enderror
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>
                    <div class="container-login100-form-btn m-t-32">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div style="padding:20px 20px 0px 0px; width:100% ; text-align: right">
                        <a href="{{route('password.request')}}">Forgot your Password?</a>
                    </div>
                </form>
            
@endsection
