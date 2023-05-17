@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">Marketing Management</legend>
        </div>
        <div class="flex justify-center">
            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl  w-3/5">
                <legend class="text-center text-black text-2xl pb-10">Add Voucher</legend>
                <form method="POST" action="{{ route('createVoucher') }}">
                    @csrf
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Type of Voucher" aria-label="Input"
                            name="type_of_voucher" required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Voucher Name" aria-label="Input"
                            name="voucher_name" required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Voucher Code" aria-label="Input"
                            name="voucher_code" required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Minimum Order" aria-label="Input"
                            name="minimum_order" required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="date" placeholder="Valid Until" aria-label="Input"
                            name="valid_until" required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Promo Details" aria-label="Input"
                            name="promo_details" required>
                    </div>
                    <div class="pt-5  flex justify-center text-center pb-5">
                        <button
                            class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                            type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
