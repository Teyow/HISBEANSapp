@extends('layouts.app')

@section('content')
    <div class=" h-screen w-full" style="background-image: url(/images/cover.png)">


        <div class="flex justify-center  items-center  pt-48 ">
            <div class="uk-card uk-card-default uk-card-body  text-center rounded-3xl w-1/4">
                <div class="flex justify-center items-center">
                    <img class=" text-center pb-20" src="{{ asset('images/hb1.png') }} " alt="" srcset=""
                        width="300" height="300">
                </div>

                <legend class="mt-2 mb-5 text-black text-sm pb-5">Please input your Credentials to continue.</legend>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="uk-input" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="bg-blue-500 text-white rounded-xl pl-10 pr-10 pt-2 pb-2 mt-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
