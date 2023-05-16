@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">USERS</legend>
        </div>
        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl">
            <div class="pt-5  flex justify-end text-center pb-5">
                <a class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                    href="{{ route('addusers') }}">+ Add
                    User</a>
            </div>
            <table id="users_table" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Contact No.</th>
                        <th>PIN Code</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->fname }} {{ $employee->lname }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->role }}</td>
                            <td>{{ $employee->cnumber }}</td>
                            <td></td>
                            <td>Enable</td>
                            <td> <span class="text-blue-500">
                                    <a href="" uk-icon="search"></a>
                                </span>

                                <span class="text-red-500 p-5">
                                    <button id="delete{{ $employee->id }}" uk-icon="trash"></button>
                                </span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#users_table').DataTable();
        });
    </script>
@endsection
