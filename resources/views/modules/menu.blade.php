@extends('layouts.main')

@section('pagecontent')
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">MENU</legend>
        </div>
        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl">
            <div class="pt-5  flex justify-end text-center pb-5">
                <a class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                    href="{{ route('addMenu') }}">+ Add
                    Item</a>
            </div>
            <table id="menu_list" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Item Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $menu)
                        <tr>
                            <td>{{ $menu->item_name }}</td>
                            <td>{{ $menu->item_description }}</td>
                            <td>{{ $menu->price }}</td>
                            <td>{{ $menu->category }}</td>
                            <td>{{ $menu->status }}</td>
                            <td><span class="text-green-500">
                                    <a href="/editMenu{{ $menu->id }}" uk-icon="pencil"></a>
                                </span>

                                <span class="text-red-500 p-5">
                                    <button id="delete{{ $menu->id }}" uk-icon="trash"></button>
                                </span>
                            </td>
                        </tr>
                        <script>
                            $("#delete{{ $menu->id }}").click(function() {
                                const formdata = new FormData()
                                formdata.append("id", "{{ $menu->id }}")

                                axios.post("/deleteMenu", formdata)
                                    .then(() => {
                                        swal({
                                            icon: "success",
                                            title: "Menu Deleted!",
                                            text: "Menu has been deleted successfully!",
                                            buttons: false
                                        }).then(() => {
                                            location.reload()
                                        })
                                    })
                            })

                            $(document).ready(function() {
                                $('#users_table').DataTable();
                            });
                        </script>
                    @empty
                    @endforelse

                </tbody>

            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#menu_list').DataTable();
        });
    </script>
    </div>
@endsection
