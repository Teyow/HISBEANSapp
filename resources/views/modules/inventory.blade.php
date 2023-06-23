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
            <legend class="text-4xl text-black text-center">INVENTORY</legend>
        </div>
        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl">
            <div class="pt-5  flex justify-end text-center pb-5">
                <a class="  bg-green-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                    href="{{ route('addItems') }}">+ Add
                    Item</a>

            </div>
            <div class="pt-5  flex justify-center text-center pb-5">
                <a class="  bg-blue-500 text-white rounded-xl p-2 w-40 text-center hover:no-underline hover:text-white hover:bg-slate-400 duration-50"
                    href="{{ route('PrintInventory') }}" type="submit">Print Iventory</a>
            </div>

            <div class="a">
                <table id="inventory_table" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Iitem ID</th>
                            <th>Name</th>
                            <th>Cost Price</th>
                            <th>Selling Price</th>
                            <th>Quantity</th>
                            <th>Product ID</th>
                            <th>Supplier</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->cost_price }}</td>
                                <td>{{ $item->selling_price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->product_id }}</td>
                                <td>{{ $item->supplier }}</td>
                                <td><span class="text-green-500">
                                        <a href="/editInventory/{{ $item->id }}" uk-icon="pencil"></a>
                                    </span>

                                    <span class="text-red-500 ">
                                        <button id="delete{{ $item->id }}" uk-icon="trash"></button>
                                    </span>
                                </td>
                            </tr>
                            <script>
                                $("#delete{{ $item->id }}").click(function() {
                                    const formdata = new FormData()
                                    formdata.append("id", "{{ $item->id }}")
                                    axios.post("/deleteInventory", formdata)
                                        .then(() => {
                                            swal({
                                                icon: "success",
                                                title: "Item Deleted!",
                                                text: "Item has been deleted successfully!",
                                                buttons: false
                                            }).then(() => {
                                                location.reload()
                                            })
                                        })
                                })

                                $(document).ready(function() {
                                    $('#users_table').DataTable({
                                        dom: "Bfrltip",
                                        lengthMenu: [1, 5, 10, 20, 50],
                                        pageLength: 5,
                                    });
                                });
                            </script>
                        @empty
                        @endforelse


                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#inventory_table').DataTable();
        });
    </script>
@endsection
