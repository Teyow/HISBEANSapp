@extends('layouts.main')

@section('pagecontent')
    <style>
        div.a {
            height: 580px;

            overflow: auto;
        }
    </style>
    <div class="">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">USERS</legend>
        </div>
        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl">
            <div class="pt-5  flex justify-end text-center pb-5">
                <a class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                    href="{{ route('addusers') }}">+ Add
                    User</a>
            </div>
            <div class="a">
                <table id="users_tables" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
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
                        @forelse ($employees as $employee)
                            <tr>
                                <td>{{ $employee->fname }} {{ $employee->lname }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->role }}</td>
                                <td>{{ $employee->cnumber }}</td>
                                <td>{{ $employee->pincode }}</td>
                                <td>{{ $employee->status }}</td>
                                <td> <span class="text-green-500">
                                        <a href="/editUser/{{ $employee->id }}" uk-icon="pencil"></a>
                                    </span>

                                    <span class="text-red-500 p-5">
                                        <button id="delete{{ $employee->id }}" uk-icon="trash"></button>
                                    </span>
                                </td>
                            </tr>
                            <script>
                                $("#delete{{ $employee->id }}").click(function() {
                                    const formdata = new FormData()
                                    formdata.append("id", "{{ $employee->id }}")
                                    axios.post("/deleteUser", formdata)
                                        .then(() => {
                                            swal({
                                                icon: "success",
                                                title: "User Deleted!",
                                                text: "User has been deleted successfully!",
                                                buttons: false
                                            }).then(() => {
                                                location.reload()
                                            })
                                        })
                                })

                                $(document).ready(function() {
                                    $('#users_tables').DataTable({

                                        lengthMenu: [5, 10, 20, 50],
                                        pageLength: 5,
                                    });
                                });
                            </script>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Employees yet</td>
                            </tr>
                        @endforelse



                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
