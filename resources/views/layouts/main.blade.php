@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-5 gap-4  uk-position-z-index">
        <div class="hidden lg:col-span-1 lg:inline ">
            <div class="uk-card uk-card-default uk-card-body h-screen   " style="background: #37251b">


                <ul class=" uk-nav-parent-icon " uk-nav>
                    <li class="uk-active px-6 py-4 ">
                        <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('dashboard') ? 'bg-amber-900 text-white' : 'bg-white text-black' }}"
                            href="{{ route('dashboard') }}">
                            <div class="pl-5"><span uk-icon="icon: home; ratio: 1.2"></span></div><span
                                class="ml-4">Dashboard</span>
                        </a>
                    </li>
                    <li class="uk-active px-6 py-4">
                        <a class=" hover:no-underline hover:text-blue-200  rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('menu') ? 'bg-amber-900 text-white' : 'bg-white text-black' }}"
                            href="{{ route('menu') }}">
                            <div class="pl-5"><span uk-icon="icon: menu; ratio: 1.2"></span></div><span
                                class="ml-4">Menu</span>
                        </a>
                    </li>
                    <li class="uk-active px-6 py-4">
                        <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('orderPOS') ? 'bg-amber-900 text-white' : 'bg-white text-black' }}"
                            href="{{ route('orderPOS') }}">
                            <div class="pl-5"><span uk-icon="icon: calendar; ratio: 1.2"></span></div><span
                                class="ml-4">Order/POS</span>
                        </a>
                    </li>
                    <li class="uk-active px-6 py-4">
                        <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('sales') ? 'bg-amber-900 text-white' : 'bg-white text-black' }}"
                            href="{{ route('sales') }}">
                            <div class="pl-5"><span uk-icon="icon: cart; ratio: 1.2"></span></div><span
                                class="ml-4">Sales</span>
                        </a>
                    </li>
                    <li class="uk-active px-6 py-4">
                        <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('inventory') ? 'bg-amber-900 text-white' : 'bg-white text-black' }}"
                            href="{{ route('inventory') }}">
                            <div class="pl-5"><span uk-icon="icon: bag; ratio: 1.2"></span></div><span
                                class="ml-4">Inventory</span>
                        </a>
                    </li>
                    <li class="uk-active px-6 py-4">
                        <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('marketing') ? 'bg-amber-900 text-white' : 'bg-white text-black' }}"
                            href="{{ route('marketing') }}">
                            <div class="pl-5"><span uk-icon="icon: world; ratio: 1.2"></span></div><span
                                class="ml-4">Marketing</span>
                        </a>
                    </li>
                    <li class="uk-active px-6 py-4">
                        <a class=" hover:no-underline hover:text-blue-200   rounded-md h-12  p-10 w-auto hover:bg-slate-400 duration-10  {{ Route::is('users') ? 'bg-amber-900 text-white' : 'bg-white text-black' }}"
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
