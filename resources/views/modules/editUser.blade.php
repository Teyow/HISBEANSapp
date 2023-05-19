@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">User Management</legend>
        </div>
        <div class="flex justify-center">
            <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl  w-3/5">
                <legend class="text-center text-black text-2xl pb-10">Edit a User</legend>
                <form action="{{ route('updateUser', $employee->id) }}" method="post">
                    @csrf
                    <div class="grid grid-cols-2">
                        <div class="col-span-1">
                            <div class="uk-margin pr-5">
                                <input class="uk-input" type="text" placeholder="First Name" aria-label="Input"
                                    name="fname" value="{{ $employee->fname }}" required>

                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="uk-margin">
                                <input class="uk-input" type="text" placeholder="Last Name" aria-label="Input"
                                    name="lname" value="{{ $employee->lname }}" required>

                            </div>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Username" aria-label="Input" name="username"
                            value="{{ $employee->username }}" required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="email" placeholder="Email" aria-label="Input" name="email"
                            value="{{ $employee->email }}" required>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Password" aria-label="Input" name="password"
                            value="{{ $employee->password }}" required>
                    </div>
                    <div class="uk-margin">

                        <select class="uk-select" aria-label="Select" name="role" required>
                            <option value="Admin" {{ $employee->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Staff" {{ $employee->role == 'Staff' ? 'selected' : '' }}>Staff</option>
                        </select>
                    </div>
                    <div class="uk-margin">
                        <input class="uk-input" type="number" placeholder="Contact Number" aria-label="Input"
                            name="cnumber" value="{{ $employee->cnumber }}" required>
                    </div>
                    <div class="uk-margin">
                        <select class="uk-select" aria-label="Select" name="status" required>
                            <option value="Enable" {{ $employee->status == 'Enable' ? 'selected' : '' }}>Enable</option>
                            <option value="Disable" {{ $employee->status == 'Disable' ? 'selected' : '' }}>Disable</option>
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
