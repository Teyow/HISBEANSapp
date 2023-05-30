@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">EDIT MENU</legend>
        </div>
        <div class="flex justify-center">
            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl  w-3/5">
                <form action="{{ route('updateMenu', $menu->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- <div class=" uk-placeholder uk-text-center h-20">
                        <input type="file" name="image" value="{{ $menu->image_path }}">
                    </div> --}}
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Item Name" aria-label="Input" name="item_name"
                            value="{{ $menu->item_name }}" required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Item Description" aria-label="item_description"
                            value="{{ $menu->item_description }}" name="item_description" required>
                    </div>

                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Price" aria-label="Input" name="price"
                            value="{{ $menu->price }}" required>
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
                            <option value="Featured" {{ $menu->is_featured == 'Featured' ? 'selected' : '' }}>Featured
                            </option>
                            <option value="Not Featured" {{ $menu->is_featured == 'Not Featured' ? 'selected' : '' }}>Not
                                Featured</option>
                        </select>
                    </div>
                    <div class="uk-margin">
                        <select class="uk-select" aria-label="Select" name="status" required>
                            <option value="Enable" {{ $menu->status == 'Enable' ? 'selected' : '' }}>Enable</option>
                            <option value="Disable" {{ $menu->status == 'Disable' ? 'selected' : '' }}>Disable</option>
                        </select>
                    </div>

                    <div class="pt-5  flex justify-center text-center pb-5">
                        <button
                            class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                            type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
