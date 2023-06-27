@extends('layouts.app')
{{--
    DARK GREEN - #23442B
    DARK BROWN - #231F20
    LIGHT BROWN - #FFECD3
    ORANGE - #F15A38
    WHITE- FFFFFF

    --}}
<style>
    div.nav:hover {
        width: 350px;
        transition: all 0.5s ease;
        z-index: 1;

    }

    span {
        position: relative;
    }
</style>
@section('content')
    <div class="grid grid-cols-9  ">
        <div class="nav">
            <div class="hidden lg:col-span-1 lg:inline">
                <div class="s uk-card  min-h-full  " style="background: #231F20">
                    <div class="flex justify-center items-center pb-10">
                        <a class=" hidden lg:inline pt-10" href="{{ route('dashboard') }}">

                            <img src="{{ asset('images/logo-image.png') }}" alt="" height="200" width="200"
                                style="position: relative">
                        </a>
                    </div>
                    @if (Auth::user()->role == 'Admin')
                        <ul class=" uk-nav-parent-icon" uk-nav>
                            <li class="uk-active px-6 py-4 pl-16 pr-16">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('dashboard') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                    href="{{ route('dashboard') }}">
                                    <div class="pl-7 "><span uk-icon="icon: home; ratio: 1.2"
                                            style="width: 50px; position: relative; display: table;"></span>
                                    </div>
                                    <span class="ml-6   ">Dashboard</span>
                                </a>
                            </li>
                            <li class="uk-parent px-6 py-4 pl-16 pr-16">
                                <a href="#"
                                    class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('menu', 'category', 'addMenu', 'addCategory') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}">
                                    <div class="pl-7 "><span uk-icon="icon: menu; ratio: 1.2"></span></div>
                                    <span class="ml-4 hidden  ">Menu</span>
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
                            <li class="uk-active px-6 py-4 pl-16 pr-16">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('orderPOS', 'OrderMenu') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                    href="{{ route('orderPOS') }}">
                                    <div class="pl-7 2xl:inline xl:hidden md:inline sm:inline  inline "><span
                                            uk-icon="icon: calendar; ratio: 1.2"></span>
                                    </div>
                                    <span class="ml-4 hidden ">Order/POS</span>
                                </a>
                            </li>
                            <li class="uk-active px-6 py-4 pl-16 pr-16">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('sales') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                    href="{{ route('sales') }}">
                                    <div class="pl-7 2xl:inline hidden"><span uk-icon="icon: cart; ratio: 1.2"></span></div>
                                    <span class="ml-4 hidden">Sales</span>
                                </a>
                            </li>
                            <li class="uk-active px-6 py-4 pl-16 pr-16">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('inventory', 'addItems') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                    href="{{ route('inventory') }}">
                                    <div class="pl-7 2xl:inline hidden"><span uk-icon="icon: bag; ratio: 1.2"></span></div>
                                    <span class="ml-4 hidden">Inventory</span>
                                </a>
                            </li>
                            <li class="uk-parent px-6 py-4 pl-16 pr-16 ">
                                <a href="#"
                                    class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('vouchers', 'promotions', 'addVoucher', 'AddPromotions') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}">
                                    <div class="pl-7 2xl:inline hidden "><span uk-icon="icon: world; ratio: 1.2"></span>
                                    </div>
                                    <span class="ml-4 hidden ">Marketing</span>
                                </a>
                                <ul class="uk-nav-sub pt-2">
                                    <div class="pt-5">


                                        <li
                                            class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5  w-auto hover:bg-slate-400 duration-10 mb-5 {{ Route::is('vouchers', 'addVoucher') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}">
                                            <a href="{{ route('vouchers') }}" class="text-black"><span
                                                    class="mt-1 hidden">Vouchers</span>
                                            </a>
                                        </li>
                                        <li
                                            class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5 w-auto hover:bg-slate-400 duration-10  {{ Route::is('promotions', 'AddPromotions') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}">
                                            <a href="{{ route('promotions') }}" class="text-black "><span
                                                    class="mt-1 hidden">Promotions</span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                            <li class="uk-active px-6 py-4 pl-16 pr-16">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('users') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                    href="{{ route('users') }}">
                                    <div class="pl-7 2xl:inline hidden"><span uk-icon="icon: users; ratio: 1.2"></span>
                                    </div>
                                    <span class="ml-4 hidden">Users</span>
                                </a>
                            </li>

                        </ul>
                    @elseif (Auth::user()->role == 'Staff')
                        <ul class=" uk-nav-parent-icon " uk-nav>
                            <li class="uk-active px-6 py-4 pl-16 pr-16">
                                <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('orderPOS', 'OrderMenu') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                                    href="{{ route('orderPOS') }}">
                                    <div class="pl-7 2xl:inline hidden"><span uk-icon="icon: calendar; ratio: 1.2"></span>
                                    </div>
                                    <span class="ml-4 hidden">Order/POS</span>
                                </a>
                            </li>
                        </ul>
                    @endif

                </div>
            </div>
        </div>
        <!-- ... -->
        <div class="col-span-9 lg:col-span-8 ">@yield('pagecontent')</div>
    </div>
@endsection
