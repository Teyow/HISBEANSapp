@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">ADD ITEMS</legend>
        </div>
        <div class="flex justify-center">
            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl  w-3/5">
                <div class="pt-5   text-left pb-5">
                    <a class="  bg-green-500 text-white rounded-xl p-2 w-24 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                        type="submit" href="{{ route('inventory') }}">Back</a>
                </div>
                <legend class="text-center text-black text-2xl pb-10">Add an Item</legend>
                <form method="POST" action="{{ route('createItems') }}">
                    @csrf


                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Name" aria-label="Input" name="name"
                            required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Cost Price" aria-label="Input" name="cost_price"
                            required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Selling Price" aria-label="Input"
                            name="selling_price" required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Quantity" aria-label="Input" name="quantity"
                            required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Product ID" aria-label="Input" name="product_id"
                            required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Supplier" aria-label="Input" name="supplier"
                            required>
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
