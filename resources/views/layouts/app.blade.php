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

    {{-- Data Tables --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.uikit.min.js"></script>

    {{-- Chart JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.2/dist/chart.min.js"></script>
    <script src="data_chart.js"></script>

    {{-- Data Tables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.uikit.min.css">

    {{-- PINCODE JS --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.20/lodash.min.js"></script>

    {{-- Axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>

    {{-- SWAL --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div id="app">
        @auth
            <nav class="uk-navbar-container h-16" style="background-color:  #ffecd3" uk-navbar>

                <div class="uk-navbar-left ">
                    <a class="w-24 hidden lg:inline ml-36" href="{{ route('dashboard') }}">

                        <img src="{{ asset('images/hb1.png') }}" alt="" height="1000" width="1000">
                    </a>


                    {{-- BURGER MENU --}}
                    <div class="lg:hidden block  text-white">
                        <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#offcanvas-slide" uk-toggle></a>
                    </div>

                </div>


                <div class="uk-navbar-center ">
                    <img src="{{ asset('images/hb1.png') }} " alt="" class="w-24 h-24 block lg:hidden ">
                </div>

                <div class="uk-navbar-right">

                    <div class="uk-inline mr-10">

                        <span class="uk-margin-small-right flex justify-center items-center text-black">
                            <div class="mr-4 text-black"></div>
                            <span uk-icon="chevron-down" class=""></span>
                        </span>
                        <div uk-drop="mode: click">
                            <div class="uk-card uk-card-body uk-card-default w-64 h-1">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button type="submit">logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </nav>


            <div id="offcanvas-slide" uk-offcanvas>
                <div class="uk-offcanvas-bar h-screen  " style="background: #231f20">
                    <legend class="text-center pb-20 pt-5 font-bold text-lg text-white">HISBEANS</legend>
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
