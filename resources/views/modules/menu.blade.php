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
                        <th>Picture</th>
                        <th>Item Name</th>
                        <th>Item Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Feature</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $menu)
                        <tr>
                            <td><img src="{{ asset('image/menu/' . $menu->image_path) }}" class="w-40"></td>
                            <td>{{ $menu->item_name }}</td>
                            <td>{{ $menu->item_description }}</td>
                            <td>{{ $menu->price }}</td>
                            <td>{{ $menu->category }}</td>
                            <td>{{ $menu->is_featured }}</td>
                            <td>{{ $menu->status }}</td>
                            <td><span class="text-green-500">
                                    <a href="/editMenu/{{ $menu->id }}" uk-icon="pencil"></a>
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
    <div class="container">
        <div class="row justify-content-center">
            <legend class="text-4xl text-black text-center">ORDER</legend>
        </div>
        <div class="uk-card uk-card-default uk-card-body ml-5 mr-5 mt-10 rounded-xl">
            <table id="order_list" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Total Price</th>
                        <th>Order Status</th>
                        <th>Mode Of Payment</th>
                        <th>Payment Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->fname }} {{ $order->lname }}</td>
                            <td>₱{{ $order->total_price }}</td>
                            <td>{{ $order->order_status }}</td>
                            <td>{{ $order->mode_of_payment }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>
                                <button id="changeStatus{{ $order->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#198754"
                                        class="bi bi-check2-square" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <script>
                            $("#changeStatus{{ $order->id }}").click(function() {
                                axios.post('/completeStatus', {
                                    order_id: "{{ $order->id }}",
                                    deviceToken: "{{ $order->notification_token }}"
                                }).then(response => {
                                    swal({
                                        icon: "success",
                                        title: "Order Completed!",
                                        text: "The order has been completed!"
                                    }).then(() => {
                                        location.reload()
                                    })
                                }).catch(err => {
                                    swal({
                                        icon: "error",
                                        title: "Error!",
                                        text: "There was a problem in processing your request!"
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
            $('#order_list').DataTable();
        });
    </script>
    </div>
@endsection
