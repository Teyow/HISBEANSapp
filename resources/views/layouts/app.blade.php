<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <link rel="icon" href="{{ asset('images/logo2.png') }}">
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
            <nav class="uk-navbar-container h-16" style="background-color:  #f25d3b" uk-navbar>

                <div class="uk-navbar-left ">



                    {{-- BURGER MENU --}}
                    <div class="lg:hidden block  text-black">
                        <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#offcanvas-slide" uk-toggle></a>
                    </div>

                </div>


                <div class="uk-navbar-center ">
                    <img src="{{ asset('images/hb1.png') }} " alt="" class="w-24 h-24 block lg:hidden ">
                </div>

                <div class="uk-navbar-right">

                    <div class="uk-inline">

                        <span class="uk-margin-small-right flex justify-center items-center text-black">
                            <div class="mr-4 text-black"></div>
                            <span uk-icon="bell" class=""></span>
                        </span>
                        <div uk-drop="mode: click">
                            <div class="uk-card uk-card-body uk-card-default  mt-5 rounded-lg mr-24">
                                <form>
                                    @csrf

                                    <button type="submit">Notification</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="uk-inline mr-10">

                        <span class="uk-margin-small-right flex justify-center items-center text-black">
                            <div class="mr-4 text-black"></div>
                            <span uk-icon="chevron-down" class=""></span>
                        </span>
                        <div uk-drop="mode: click">
                            <div class="uk-card uk-card-body uk-card-default  mt-5 rounded-lg ml-24">
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
                    @if (Auth::user()->role == 'Admin')
                        <ul class="uk-nav uk-nav-default">

                            <li class="uk-active pb-6">
                                <legend class="text-left  pt-5 font-bold  text-white">Home</legend>

                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('dashboard') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                    href="{{ route('dashboard') }}">
                                    <div class="pl-5"><span uk-icon="icon: home; ratio: 1.2"></span></div><span
                                        class="ml-4">Dashboard</span>
                                </a>


                            </li>
                            <li class="uk-parent px-6 py-4 ">
                                <a href="#"
                                    class=" hover:no-underline hover:text-blue-200 font-black  rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('menu', 'category') ? 'bg-orange-700  text-white' : 'bg-white text-black' }}">
                                    <div class="pl-5 "><span uk-icon="icon: menu; ratio: 1.2"></span></div><span
                                        class="ml-4 ">Menu</span>
                                </a>
                                <ul class="uk-nav-sub pt-2">
                                    <div class="pt-5">
                                        <li
                                            class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5  w-auto hover:bg-slate-400 duration-10 mb-5 {{ Route::is('menu') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}">
                                            <a href="{{ route('menu') }}" class="text-black"><span class="mt-1">Menu
                                                    Items</span>
                                            </a>
                                        </li>
                                        <li
                                            class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5 w-auto hover:bg-slate-400 duration-10  {{ Route::is('category') ? 'bg-orange-700  text-white' : 'bg-white text-black' }}">
                                            <a href="{{ route('category') }}" class="text-black "><span
                                                    class="mt-1">Category</span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>
                            </li>

                            <li class="uk-active px-6 py-4">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('orderPOS') ? 'bg-orange-700  text-white' : 'bg-white text-black' }}"
                                    href="{{ route('orderPOS') }}">
                                    <div class="pl-5"><span uk-icon="icon: calendar; ratio: 1.2"></span></div><span
                                        class="ml-4">Order/POS</span>
                                </a>
                            </li>

                            <li class="uk-active px-6 py-4">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('sales') ? 'bg-orange-700  text-white' : 'bg-white text-black' }}"
                                    href="{{ route('sales') }}">
                                    <div class="pl-5"><span uk-icon="icon: cart; ratio: 1.2"></span></div><span
                                        class="ml-4">Sales</span>
                                </a>
                            </li>
                            <li class="uk-active px-6 py-4">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('inventory') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                    href="{{ route('inventory') }}">
                                    <div class="pl-5"><span uk-icon="icon: bag; ratio: 1.2"></span></div><span
                                        class="ml-4">Inventory</span>
                                </a>
                            </li>
                            <li class="uk-parent px-6 py-4 ">
                                <a href="#"
                                    class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('vouchers', 'promotions') ? 'bg-orange-700  text-white' : 'bg-white text-black' }}">
                                    <div class="pl-5 "><span uk-icon="icon: world; ratio: 1.2"></span></div><span
                                        class="ml-4 ">Marketing</span>
                                </a>
                                <ul class="uk-nav-sub pt-2">
                                    <div class="pt-5">


                                        <li
                                            class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5  w-auto hover:bg-slate-400 duration-10 mb-5 {{ Route::is('vouchers') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}">
                                            <a href="{{ route('vouchers') }}" class="text-black"><span
                                                    class="mt-1">Vouchers</span>
                                            </a>
                                        </li>
                                        <li
                                            class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5 w-auto hover:bg-slate-400 duration-10  {{ Route::is('promotions') ? 'bg-orange-700  text-white' : 'bg-white text-black' }}">
                                            <a href="{{ route('promotions') }}" class="text-black "><span
                                                    class="mt-1">Promotions</span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                            <li class="uk-active px-6 py-4">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('users') ? 'bg-orange-700  first-letter: text-white' : 'bg-white text-black' }}"
                                    href="{{ route('users') }}">
                                    <div class="pl-5"><span uk-icon="icon: users; ratio: 1.2"></span></div><span
                                        class="ml-4">Users</span>
                                </a>
                            </li>
                        </ul>
                    @elseif (Auth::user()->role == 'Staff')
                        <ul class=" uk-nav-parent-icon " uk-nav>
                            <li class="uk-active px-6 py-4">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('orderPOS') ? 'bg-orange-700  text-white' : 'bg-white text-black' }}"
                                    href="{{ route('orderPOS') }}">
                                    <div class="pl-5"><span uk-icon="icon: calendar; ratio: 1.2"></span></div><span
                                        class="ml-4">Order/POS</span>
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
