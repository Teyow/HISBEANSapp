@extends('layouts.app')

@section('content')
    <div class=" h-screen w-full" style="background-image: url(/images/cover.png)">


        <div class="flex justify-center  items-center  pt-48 ">
            <div class="uk-card uk-card-default uk-card-body  text-center rounded-3xl w-1/4">
                <div class="flex justify-center items-center">
                    <img class=" text-center" src="{{ asset('images/hb1.png') }} " alt="" srcset="" width="300"
                        height="300">
                </div>

                <legend class="mt-2 mb-5 text-black text-sm">Please input your Credentials to continue.</legend>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="uk-input @error('email') is-invalid @enderror"
                                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                disabled>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="uk-input @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="uk-input" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="bg-blue-500 text-white rounded-xl pl-10 pr-10 pt-2 pb-2 mt-5">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
