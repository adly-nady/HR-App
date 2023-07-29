@extends('layouts.app')

@section('content')
<style>
    body
    {
        /* background: url("http://localhost/HR_Alex_Project/public/5506731.webp"); */
        background: url("back1.png");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br><br>
                <div class="card" style="background-color:#fff0;backdrop-filter: blur(10px);box-shadow: 0px 0px 10px 0.7px #a1c7ff3a;">
                    <div class="card-header" style="text-align: center;color: rgb(0, 0, 0);"> صــفــحــة تــســجــيــل الــدخـــول </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <img src="{{url('new_hr.png')}}" style="width: 100%;margin-left: -30px" alt="" srcset="">
                                </div>
                                <div class="col-6">

                                    <div class="row mb-3">

                                        <div class="col-md-12">
                                            <br>
                                            <label for="email" style="color: black">البريد الالكترونى</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="background-color:#fff0;backdrop-filter: blur(10px);box-shadow: 5px 5px 5px 0.5px #a1c7ff30;" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-md-12">
                                            <br>
                                            <label for="password" style="color: black">كلمة المرور</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="background-color:#fff0;backdrop-filter: blur(10px);box-shadow: 5px 5px 5px 0.5px #a1c7ff30;">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" style="background-color:#fff0;backdrop-filter: blur(10px);box-shadow: 5px 5px 5px 0.5px #a1c7ff30;" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember" style="color: white">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="row mb-0">
                                        <br>
                                        <div class="col-md-8 offset-md-4">
                                            <br>

                                            <button class="btn btn-primary" style="width: 120px; font-size: 16px;" role="button"><span class="text"> تسجيل الدخول  </span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!--

{{---
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                            --}}
-->

