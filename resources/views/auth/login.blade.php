@extends('layouts.app')

@section('content')
    <section id="login">
        <div class=" h-screen w-full" style="background-image: url(images/cover.jpg)">


            <div class="flex justify-center  items-center  pt-48">
                <div class="uk-card uk-card-default uk-card-body  text-center rounded-3xl ">
                    <div class="flex justify-center items-center">
                        <img class=" text-center" src="{{ asset('images/hb1.png') }} " alt="" srcset=""
                            width="200" height="200">
                    </div>
                    <legend class="mt-10 mb-5 text-black ">Please input your Credentials to continue.</legend>
                    <form method="POST" action="user">
                        @csrf
                        <input class="uk-input  mb-5 w-3/5" type="text" placeholder="Email" aria-label="uk-width-1-2"
                            name="email">
                        <input class="uk-input w-3/5" type="password" placeholder="Passwrod" aria-label="uk-width-1-2"
                            name="password">
                        <div class=""><button type="submit"
                                class="bg-blue-500 text-white rounded-xl pl-10 pr-10 pt-2 pb-2 mt-5">Login</button></div>
                    </form>
                </div>
            </div>

        </div>



    </section>
@endsection
