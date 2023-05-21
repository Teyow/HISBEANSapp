@extends('layouts.app')

@section('content')
    <div class=" h-screen w-full" style="background-image: url(images/cover.jpg)">


        <div class="flex justify-center  items-center  pt-48 ">
            <div class="uk-card uk-card-default uk-card-body  text-center rounded-3xl w-1/4">
                <div class="flex justify-center items-center">
                    <img class=" text-center" src="{{ asset('images/hb1.png') }} " alt="" srcset="" width="300"
                        height="300">
                </div>
                <legend class="mt-10 mb-5 text-black ">Please input your Credentials to continue.</legend>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="uk-margin">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                            <input class="uk-input w-10" type="text" aria-label="Not clickable icon" name="username"
                                placeholder="Username">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                            <input class="uk-input" type="password" aria-label="Not clickable icon" name="password"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <div class=""> <button type="submit"
                                    class="bg-blue-500 text-white rounded-xl pl-10 pr-10 pt-2 pb-2 mt-5">
                                    {{ __('Login') }}
                                </button></div>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
