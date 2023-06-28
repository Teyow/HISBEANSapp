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
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.uikit.min.js"></script>

    {{-- Chart JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.2/dist/chart.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Data Tables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.uikit.min.css">

    {{-- PINCODE JS --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.20/lodash.min.js"></script>

    {{-- Axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>

    {{-- SWAL --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- CHART --}}
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/barchart.js') }}"></script>
    <script src="{{ asset('js/piechart.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    {{-- TOAST --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>


<body>
    <?php
    $items = DB::table('items')->get();
    
    ?>
    <div id="app">
        @auth
            <nav class="uk-navbar-container h-16" style="background-color:  #f25d3b" uk-navbar>

                <div class="uk-navbar-left ">



                    <div class="uk-inline">
                        {{-- BURGER MENU --}}

                        <div class="  text-black pl-10 lg:hidden">
                            <span class="uk-margin-small-right flex justify-center items-center text-black">
                                <a class="uk-navbar-toggle" href="#offcanvas-slide" uk-toggle><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-7 h-7 text-white">
                                        <path d="M3 12h18M3 6h18M3 18h18"></path>
                                    </svg></a>
                            </span>
                        </div>

                    </div>

                </div>


                <div class="uk-navbar-center ">
                    <img src="{{ asset('images/logo-image.png') }} " alt="" class="w-24  block lg:hidden ">
                </div>

                <div class="uk-navbar-right">

                    <div class="uk-inline">

                        <span class="uk-margin-small-right flex justify-center items-center text-black">
                            <div class="text-white">
                                <span uk-icon="bell" class=""></span>
                            </div>
                        </span>

                        <div uk-drop="mode: click">
                            <div class="uk-card uk-card-body uk-card-default  mt-5 rounded-lg ">
                                @if (Session::has('message'))
                                    <script>
                                        toastr.options = {
                                            "progressBar": true,
                                            "closeButton": true,

                                        }
                                        toastr.success("{{ Session::get('message') }}");
                                    </script>
                                @endif

                                @if (count($items) != 0)
                                    @forelse ($items as $item)
                                        <div class="uk-alert-success" uk-alert>
                                            <a class="uk-alert-close" uk-close></a>
                                            <p><span class="text-red-500">#{{ $item->id }}</span>, {{ $item->name }}
                                                has been
                                                added in Inventory.
                                            </p>
                                        </div>

                                    @empty
                                    @endforelse
                                @endif


                            </div>
                        </div>
                    </div>
                    <div class="text-white">
                        {{ Auth::user()->fname }} {{ Auth::user()->lname }}
                    </div>
                    <div class="uk-inline xl:mr-10">

                        <span class="uk-margin-small-right flex justify-center items-center text-black">
                            <div class="mr-4 text-white">
                                <span uk-icon="user" class="text-white"></span>
                            </div>
                        </span>
                        <div uk-drop="mode: click">
                            <div class="uk-card uk-card-body uk-card-default  mt-5 rounded-lg ml-24">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button type="submit">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </nav>

            <div id="offcanvas-slide" uk-offcanvas="mode: push; overlay: true">
                <div class="uk-offcanvas-bar h-screen  " style="background: #231f20">
                    <div class="flex justify-center items-center">
                        <img class=" text-center" src="{{ asset('images/hb1.png') }} " alt="" srcset=""
                            width="300" height="300">
                    </div>
                    @if (Auth::user()->role == 'Admin')
                        <ul class="uk-nav uk-nav-default">

                            <li class=" px-6 py-4">


                                <a class=" hover:no-underline hover:text-white   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('dashboard') ? 'bg-orange-700 text-white' : 'bg-black text-black' }}"
                                    href="{{ route('dashboard') }}">
                                    <div class="pl-5 text-white"><span uk-icon="icon: home; ratio: 1.2"></span></div><span
                                        class="ml-4 text-white">Dashboard</span>
                                </a>


                            </li>
                            <li class="uk-parent px-6 py-4 ">
                                <ul class="uk-nav-default" uk-nav>
                                    <li class="uk-parent">
                                        <a href="#"
                                            class=" hover:no-underline hover:text-blue-200 font-black  rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('menu', 'category') ? 'bg-orange-700  text-white' : 'bg-black text-black' }}">
                                            <div class="pl-5 text-white "><span uk-icon="icon: menu; ratio: 1.2"></span>
                                            </div><span class="ml-4 text-white">Menu </span>
                                        </a>

                                        <ul class="uk-nav-sub pt-2">
                                            <div class="pt-5">
                                                <li
                                                    class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5  w-auto hover:bg-slate-400 duration-10 mb-5 {{ Route::is('menu') ? 'bg-orange-700 text-white' : 'bg-black text-black' }}">
                                                    <a href="{{ route('menu') }}" class="text-black"><span
                                                            class="mt-1">Menu
                                                            Items</span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5 w-auto hover:bg-slate-400 duration-10  {{ Route::is('category') ? 'bg-orange-700  text-white' : 'bg-black text-black' }}">
                                                    <a href="{{ route('category') }}" class="text-black "><span
                                                            class="mt-1">Category</span>
                                                    </a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>
                                </ul>
                            </li>




                            <li class="uk-active px-6 py-4">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('orderPOS') ? 'bg-orange-700  text-white' : 'bg-black text-black' }}"
                                    href="{{ route('orderPOS') }}">
                                    <div class="pl-5"><span uk-icon="icon: calendar; ratio: 1.2"></span></div><span
                                        class="ml-4">Order/POS</span>
                                </a>
                            </li>

                            <li class="uk-active px-6 py-4">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('sales') ? 'bg-orange-700  text-white' : 'bg-black text-black' }}"
                                    href="{{ route('sales') }}">
                                    <div class="pl-5"><span uk-icon="icon: cart; ratio: 1.2"></span></div><span
                                        class="ml-4">Sales</span>
                                </a>
                            </li>
                            <li class="uk-active px-6 py-4">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('inventory') ? 'bg-orange-700 text-white' : 'bg-black text-black' }}"
                                    href="{{ route('inventory') }}">
                                    <div class="pl-5"><span uk-icon="icon: bag; ratio: 1.2"></span></div><span
                                        class="ml-4">Inventory</span>
                                </a>
                            </li>
                            <li class="uk-parent px-6 py-4 ">
                                <ul class="uk-nav-default" uk-nav>
                                    <li class="uk-parent"><a href="#"
                                            class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('vouchers', 'promotions') ? 'bg-orange-700  text-white' : 'bg-black text-black' }}">
                                            <div class="pl-5 text-white"><span uk-icon="icon: world; ratio: 1.2"></span>
                                            </div><span class="ml-4 text-white">Marketing</span>
                                        </a>
                                        <ul class="uk-nav-sub pt-2">
                                            <div class="pt-5">


                                                <li
                                                    class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5  w-auto hover:bg-slate-400 duration-10 mb-5 {{ Route::is('vouchers') ? 'bg-orange-700 text-white' : 'bg-black text-black' }}">
                                                    <a href="{{ route('vouchers') }}" class="text-black"><span
                                                            class="mt-1">Vouchers</span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5 w-auto hover:bg-slate-400 duration-10  {{ Route::is('promotions') ? 'bg-orange-700  text-white' : 'bg-black text-black' }}">
                                                    <a href="{{ route('promotions') }}" class="text-black "><span
                                                            class="mt-1">Promotions</span>
                                                    </a>
                                                </li>
                                            </div>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="uk-active px-6 py-4">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('users') ? 'bg-orange-700  first-letter: text-white' : 'bg-black text-black' }}"
                                    href="{{ route('users') }}">
                                    <div class="pl-5"><span uk-icon="icon: users; ratio: 1.2"></span></div><span
                                        class="ml-4">Users</span>
                                </a>
                            </li>
                        </ul>
                    @elseif (Auth::user()->role == 'Staff')
                        <ul class=" uk-nav-parent-icon " uk-nav>
                            <li class="uk-active px-6 py-4">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('orderPOS') ? 'bg-orange-700  text-white' : 'bg-black text-black' }}"
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
