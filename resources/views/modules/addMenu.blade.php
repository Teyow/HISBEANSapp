@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">ADD MENU</legend>
        </div>
        <div class="flex justify-center">
            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl  w-3/5">
                <legend class="text-center text-black text-2xl pb-10">Add an Item</legend>
                <form method="POST" action="{{ route('createMenu') }}">
                    @csrf


                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Item Name" aria-label="Input" name="item_name"
                            required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Item Description" aria-label="item_description"
                            name="item_description" required>
                    </div>

                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Price" aria-label="Input" name="price"
                            required>
                    </div>
                    <div class="uk-margin">
                        <select class="uk-select" aria-label="Select" name="category" required>
                            @forelse ($category as $cat)
                                <option>{{ $cat->category_name }}</option>
                            @empty
                                <option>No categories have been set...</option>
                            @endforelse

                        </select>
                    </div>
                    <div class="uk-margin">
                        <select class="uk-select" aria-label="Select" name="is_featured" required>
                            <option>Featured</option>
                            <option>Not Featured</option>
                        </select>
                    </div>
                    <div class="uk-margin">
                        <select class="uk-select" aria-label="Select" name="status" required>
                            <option>Enable</option>
                            <option>Disable</option>
                        </select>
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
