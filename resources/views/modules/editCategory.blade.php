@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">EDIT CATEGORY</legend>
        </div>
        <div class="flex justify-center">
            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl  w-3/5">
                <legend class="text-center text-black text-2xl pb-10">Edit a Category</legend>
                <form action="{{ route('updateCategory', $categories->id) }}" method="post">
                    @csrf


                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Category Name" aria-label="Input"
                            name="category_name" value="{{ $categories->category_name }}" required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Category Description" aria-label="Input"
                            name="category_description" value="{{ $categories->category_description }}" required>
                    </div>
                    <div class="uk-margin">
                        <select class="uk-select" aria-label="Select" name="status" required>
                            <option value="Enable" {{ $categories->status == 'Enable' ? 'selected' : '' }}>Enable</option>
                            <option value="Disable" {{ $categories->status == 'Disable' ? 'selected' : '' }}>Disable
                            </option>
                        </select>
                    </div>
                    <div class="pt-5  flex justify-center text-center pb-5">
                        <button
                            class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                            type="submit" id="submitButton" href="">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
