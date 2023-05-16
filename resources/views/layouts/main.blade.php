@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-5 gap-4  uk-position-z-index">
        <div class="hidden lg:col-span-1 lg:inline ">
            <div class="uk-card uk-card-default uk-card-body min-h-screen  " style="background: #231f20">


                <ul class=" uk-nav-parent-icon " uk-nav>
                    <li class="uk-active px-6 py-4 ">
                        <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('dashboard') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}"
                            href="{{ route('dashboard') }}">
                            <div class="pl-5"><span uk-icon="icon: home; ratio: 1.2"></span></div><span
                                class="ml-4">Dashboard</span>
                        </a>
                    </li>
                    <li class="uk-parent px-6 py-4 ">
                        <a href="#"
                            class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('menu', 'category') ? 'bg-orange-700  text-white' : 'bg-white text-black' }}">
                            <div class="pl-5 "><span uk-icon="icon: menu; ratio: 1.2"></span></div><span
                                class="ml-4 ">Menu</span>
                        </a>
                        <ul class="uk-nav-sub pt-2">
                            <div class="pt-5">
                                <li
                                    class="ml-5 hover:no-underline hover:text-white   rounded-md h-10  pl-5  w-auto hover:bg-slate-400 duration-10 mb-5 {{ Route::is('menu') ? 'bg-orange-700 text-white' : 'bg-white text-black' }}">
                                    <a href="{{ route('menu') }}" class="text-black"><span class="mt-1">Menu Items</span>
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




            </div>
        </div>
        <!-- ... -->
        <div class="col-span-5 lg:col-span-4 ">@yield('pagecontent')</div>
    </div>
@endsection
