@extends('layouts.main')

@section('pagecontent')
    <div class="container bg-slate-200 h-screen">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center pt-10">DASHBOARD</legend>
        </div>

        <div class="grid grid-cols-3 pt-10">

            <div class="col-span-1">
                <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                    <h3 class="uk-card-title text-xl">Today Sales</h3>
                    <p class="text-4xl text-black">{{ $sale }}</p>
                </div>
            </div>
            <div class="col-span-1">
                <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                    <h3 class="uk-card-title text-xl">Yesterday Sales</h3>
                    <p class="text-4xl text-black">13,149</p>
                </div>
            </div>
            <div class="col-span-1">
                <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 text-center rounded-xl">
                    <h3 class="uk-card-title text-xl">All Time Sales</h3>
                    <p class="text-4xl text-black">{{ $sale }}</p>
                </div>
            </div>
        </div>

        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl ">
            <div class="grid grid-cols-3">
                @forelse ($order as $orders)
                    <div class="col-span-1">
                        <div class="uk-card  uk-card-body ml-5 mr-5 mt-10 rounded-xl " style="background: #d2c1b0">
                            <legend class="text-center text-black">Order #{{ $orders->id }}</legend>
                            <legend class="text-center text-black">{{ $orders->order_status }}</legend>
                        </div>
                    </div>

                @empty
                @endforelse
            </div>

        </div>
    </div>
    </div>
@endsection
