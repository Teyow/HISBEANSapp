@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">User Management</legend>
        </div>

        <div class="flex justify-center">
            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl  w-3/5">
                <div class="pt-5   text-left pb-5">
                    <a class="  bg-green-500 text-white rounded-xl p-2 w-24 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                        type="submit" href="{{ route('users') }}">Back</a>
                </div>
                <legend class="text-center text-black text-2xl pb-10">Register a User</legend>

                <form method="POST" action="{{ route('createuser') }}">
                    @csrf
                    <div class="grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="uk-margin pr-5">
                                <input class="uk-input" type="text" placeholder="First Name" aria-label="Input"
                                    name="fname" required>

                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="uk-margin">
                                <input class="uk-input" type="text" placeholder="Last Name" aria-label="Input"
                                    name="lname" required>

                            </div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Username" aria-label="Input" name="username"
                            required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="email" placeholder="Email" aria-label="Input" name="email"
                            required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="password" placeholder="Password" aria-label="Input" name="password"
                            required>
                    </div>
                    <div class="uk-margin">

                        <select class="uk-select" aria-label="Select" name="role" required>
                            <option>Admin</option>
                            <option>Staff</option>
                        </select>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="number" placeholder="Contact Number" aria-label="Input"
                            name="cnumber" required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="number" placeholder="PINCODE" aria-label="Input" name="pincode"
                            required>
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
                            type="submit" href="">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
