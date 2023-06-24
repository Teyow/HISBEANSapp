@extends('layouts.app')
{{--
    DARK GREEN - #23442B
    DARK BROWN - #231F20
    LIGHT BROWN - #FFECD3
    ORANGE - #F15A38
    WHITE- FFFFFF

    --}}
@section('content')
    <div class="grid grid-cols-5 gap-4  uk-position-z-index">
        <div class="hidden lg:col-span-1 lg:inline ">
            <div class="uk-card uk-card-default uk-card-body min-h-full  " style="background: #231F20">
                <div class="flex justify-center items-center pb-10">
                    <a class=" hidden lg:inline " href="{{ route('dashboard') }}">

                        <img src="{{ asset('images/logo-image.png') }}" alt="" height="200" width="200">
                    </a>
                </div>
                @if (Auth::user()->role == 'Admin')
                    <ul class=" uk-nav-parent-icon " uk-nav>
                        <li class="uk-active px-6 py-4 ">
                            <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('dashboard') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                href="{{ route('dashboard') }}">
                                <div class="pl-5 2xl:inline xl:hidden md:inline sm:inline  inline   "><span
                                        uk-icon="icon: home; ratio: 1.2"></span>
                                </div>
                                <span class="ml-4  2xl:inline xl:inline sm:hidden hidden ">Dashboard</span>
                            </a>
                        </li>
                        <li class="uk-parent px-6 py-4 ">
                            <a href="#"
                                class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('menu', 'category', 'addMenu', 'addCategory') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}">
                                <div class="pl-5 2xl:inline xl:hidden md:inline sm:inline  hidden"><span
                                        uk-icon="icon: menu; ratio: 1.2"></span></div>
                                <span class="ml-4  2xl:inline xl:inline sm:hidden hidden">Menu</span>
                            </a>
                            <ul class="uk-nav-sub pt-2">
                                <div class="pt-5">
                                    <li
                                        class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5  w-auto hover:bg-slate-400 duration-10 mb-5 {{ Route::is('menu', 'addMenu') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}">
                                        <a href="{{ route('menu') }}" class="text-black"><span class="mt-1">Menu
                                                Items</span>
                                        </a>
                                    </li>
                                    <li
                                        class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5 w-auto hover:bg-slate-400 duration-10  {{ Route::is('category', 'addCategory') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}">
                                        <a href="{{ route('category') }}" class="text-black "><span
                                                class="mt-1">Category</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <li class="uk-active px-6 py-4">
                            <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('orderPOS', 'OrderMenu') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                href="{{ route('orderPOS') }}">
                                <div class="pl-5 hidden sm:inline xl:inline"><span
                                        uk-icon="icon: calendar; ratio: 1.2"></span>
                                </div>
                                <span class="ml-4 2xl:inline  sm:hidden">Order/POS</span>
                            </a>
                        </li>
                        <li class="uk-active px-6 py-4">
                            <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('sales') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                href="{{ route('sales') }}">
                                <div class="pl-5 2xl:inline hidden"><span uk-icon="icon: cart; ratio: 1.2"></span></div>
                                <span class="ml-4">Sales</span>
                            </a>
                        </li>
                        <li class="uk-active px-6 py-4">
                            <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('inventory', 'addItems') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                href="{{ route('inventory') }}">
                                <div class="pl-5 2xl:inline hidden"><span uk-icon="icon: bag; ratio: 1.2"></span></div><span
                                    class="ml-4">Inventory</span>
                            </a>
                        </li>
                        <li class="uk-parent px-6 py-4 ">
                            <a href="#"
                                class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('vouchers', 'promotions', 'addVoucher', 'AddPromotions') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}">
                                <div class="pl-5 2xl:inline hidden "><span uk-icon="icon: world; ratio: 1.2"></span></div>
                                <span class="ml-4 ">Marketing</span>
                            </a>
                            <ul class="uk-nav-sub pt-2">
                                <div class="pt-5">


                                    <li
                                        class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5  w-auto hover:bg-slate-400 duration-10 mb-5 {{ Route::is('vouchers', 'addVoucher') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}">
                                        <a href="{{ route('vouchers') }}" class="text-black"><span
                                                class="mt-1">Vouchers</span>
                                        </a>
                                    </li>
                                    <li
                                        class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5 w-auto hover:bg-slate-400 duration-10  {{ Route::is('promotions', 'AddPromotions') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}">
                                        <a href="{{ route('promotions') }}" class="text-black "><span
                                                class="mt-1">Promotions</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <li class="uk-active px-6 py-4">
                            <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('users') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                href="{{ route('users') }}">
                                <div class="pl-5 2xl:inline hidden"><span uk-icon="icon: users; ratio: 1.2"></span></div>
                                <span class="ml-4">Users</span>
                            </a>
                        </li>

                    </ul>
                @elseif (Auth::user()->role == 'Staff')
                    <ul class=" uk-nav-parent-icon " uk-nav>
                        <li class="uk-active px-6 py-4">
                            <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('orderPOS', 'OrderMenu') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                href="{{ route('orderPOS') }}">
                                <div class="pl-5 2xl:inline hidden"><span uk-icon="icon: calendar; ratio: 1.2"></span></div>
                                <span class="ml-4">Order/POS</span>
                            </a>
                        </li>
                    </ul>
                @endif

            </div>
        </div>
        <!-- ... -->
        <div class="col-span-5 lg:col-span-4 ">@yield('pagecontent')</div>
    </div>
@endsection
