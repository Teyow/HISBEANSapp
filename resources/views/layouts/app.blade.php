<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HISBEANS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/js/uikit-icons.min.js"></script>

</head>

<body>
    <div id="app">
        @auth
            <nav class="uk-navbar-container h-16" style="background-color:  #d2c1b0" uk-navbar>

                <div class="uk-navbar-left ">
                    <a class="w-24 hidden lg:inline ml-36">
                        <img src="{{ asset('images/hb1.png') }}" alt="" height="1000" width="1000">
                    </a>


                    {{-- BURGER MENU --}}
                    <div class="lg:hidden block  text-white">
                        <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#offcanvas-slide" uk-toggle></a>
                    </div>

                </div>


                <div class="uk-navbar-center ">
                    <img src="{{ asset('image/logo.png') }} " alt="" class="w-24 h-24 block lg:hidden ">
                </div>

                <div class="uk-navbar-right">

                    <div class="uk-inline mr-10">

                        <span class="uk-margin-small-right flex justify-center items-center text-white">
                            <div class="mr-4 text-white"></div>
                            <span uk-icon="chevron-down" class=""></span>
                        </span>
                        <div uk-drop="mode: click">
                            <div class="uk-card uk-card-body uk-card-default w-64 h-1">
                                <form action="/logout" method="POST">
                                    @csrf

                                    <button type="submit">logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </nav>


            <div id="offcanvas-slide" uk-offcanvas>
                <div class="uk-offcanvas-bar h-screen  " style="background: rgb(9, 9, 83)">
                    <legend class="text-center pb-20 pt-5 font-bold text-lg text-white">San Juan Portal</legend>
                    @if (Auth::user()->user_role == 2)
                        <ul class="uk-nav uk-nav-default">

                            <li class="uk-active pb-6">
                                <a class="uk-button mx-4 text-md  bg-white hover:bg-slate-100 duration-100 rounded-lg"
                                    href="{{ route('home') }}">
                                    <span class="text-black px-5">Dashboard</span>
                                </a>
                            </li>

                            <li class="uk-active pb-6">
                                <a class="uk-button mx-4 text-md  bg-white hover:bg-slate-100 duration-100 rounded-lg"
                                    href="">
                                    <span class="text-black px-5">Profile</span>
                                </a>
                            </li>

                            <li class="uk-active pb-6">
                                <a class="uk-button mx-4 text-md  bg-white hover:bg-slate-100 duration-100 rounded-lg"
                                    href="">
                                    <span class="text-black px-5">Attendance</span>
                                </a>
                            </li>
                        </ul>
                    @else
                        <ul class="uk-nav uk-nav-default">

                            <li class="uk-active pb-6">
                                <legend class="text-left  pt-5 font-bold  text-white">Home</legend>

                                <a class="uk-button mx-4 text-md  bg-white hover:bg-slate-100 duration-100 rounded-lg"
                                    href="">
                                    <span class="text-black px-5">Dashboard</span>
                                </a>


                            </li>
                            <li class="uk-active pb-6">
                                <legend class="text-left  pt-5 font-bold  text-white">Time In/Time Out</legend>
                                <a class="uk-button mx-4 text-md   bg-white hover:bg-slate-100 duration-100 rounded-lg"
                                    href="">
                                    <span class="text-black px-5 ">Attendance</span>
                                </a>

                            </li>

                            <li class="uk-active pb-6">
                                <legend class="text-left  pt-5 font-bold  text-white">User Mamangement</legend>
                                <a class="uk-button mx-4 text-md  bg-white hover:bg-slate-100 duration-100 rounded-lg"
                                    href="">
                                    <span class="text-black px-5">Manage Employee</span>
                                </a>
                            </li>

                            <li class="uk-active pb-6">
                                <a class="uk-button mx-4 text-md  bg-white hover:bg-slate-100 duration-100 rounded-lg"
                                    href="">
                                    <span class="text-black px-5">Manage Attendance</span>
                                </a>

                            </li>
                            <li class="uk-active pb-6">
                                <a class="uk-button mx-4 text-md  bg-white hover:bg-slate-100 duration-100 rounded-lg"
                                    href="">
                                    <span class="text-black px-5">Manage Schedule</span>
                                </a>
                            </li>
                        </ul>
                    @endif


                </div>
            </div>
        @endauth


        <main>
            @yield('content')
        </main>



    </div>

</body>

</html>
