@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br><br><br>
            <div class="card" style="background-color:#fff0;backdrop-filter: blur(10px);box-shadow: 0px 0px 10px 0.7px #a1c7ff3a;">
                <div class="card-header" style="text-align: center;color: white;">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <img src="/new_hr3.png" style="width: 100%;margin-left: -30px" alt="" srcset="">
                            </div>
                            <div class="col-6">

                                <div class="row mb-3">
                                    <label for="name" class="col-form-label" style="color: white;">{{ __('Name') }}</label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" style="color: white;background-color:#fff0;backdrop-filter: blur(10px);box-shadow: 5px 5px 5px 0.5px #a1c7ff30;" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-form-label" style="color: white;">{{ __('Email Address') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" style="color: white;background-color:#fff0;backdrop-filter: blur(10px);box-shadow: 5px 5px 5px 0.5px #a1c7ff30;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-form-label" style="color: white;">{{ __('Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password" style="color: white;background-color:#fff0;backdrop-filter: blur(10px);box-shadow: 5px 5px 5px 0.5px #a1c7ff30;" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-form-label" style="color: white;">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password-confirm" style="color: white;background-color:#fff0;backdrop-filter: blur(10px);box-shadow: 5px 5px 5px 0.5px #a1c7ff30;" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button class="button-64" style="width: 100px" role="button"><span class="text"> {{ __('Register') }}</span></button>
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
