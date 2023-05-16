@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">PROMOTIONS</legend>
        </div>

        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl">
            <div class="pt-5  flex justify-end text-center pb-5">
                <a class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                    href="{{ route('AddPromotions') }}">+ Add
                    Promo</a>
            </div>
            <div class="grid grid-cols-3">
                <div class="col-span-1 uk-card uk-card-default uk-card-body ml-5 mb-5 rounded-br-2xl rounded-bl-2xl">PROMO 1
                </div>
                <div class="col-span-1 uk-card uk-card-default uk-card-body ml-5 mb-5 rounded-br-2xl rounded-bl-2xl">PROMO 2
                </div>
                <div class="col-span-1 uk-card uk-card-default uk-card-body ml-5 mb-5 rounded-br-2xl rounded-bl-2xl">PROMO 3
                </div>
            </div>
            <div class="grid grid-cols-3">
                <div class="col-span-1 uk-card uk-card-default uk-card-body ml-5 mb-5 rounded-br-2xl rounded-bl-2xl">PROMO 4
                </div>
                <div class="col-span-1 uk-card uk-card-default uk-card-body ml-5 mb-5 rounded-br-2xl rounded-bl-2xl">PROMO 5
                </div>
                <div class="col-span-1 uk-card uk-card-default uk-card-body ml-5 mb-5 rounded-br-2xl rounded-bl-2xl">PROMO 6
                </div>
            </div>
        </div>
    @endsection
